<?php

namespace App\Models;
use App\Models\Inventory_log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $primaryKey = 'stock_id';

    protected $fillable = [
        'stock_type',
        'stock_name',
        'quantity',
        'last_updated',
    ];

    public $timestamps = false;


    protected static function booted()
    {
        static::created(function ($stock) {
            Inventory_Log::create([
                'stock_id' => $stock->stock_id,
                'reference_type' => 'Supplier',
                'supplier_reference_id' => 1,
                'transaction_type' => 'Addition',
                'quantity' => $stock->quantity,
                'transaction_date' => now(),
            ]);
        });

        // Log quantity updates (additions or deductions)
        static::updating(function ($stock) {
            if ($stock->isDirty('quantity')) {
                $oldQuantity = $stock->getOriginal('quantity');
                $newQuantity = $stock->quantity;

                $transactionType = $newQuantity > $oldQuantity ? 'Addition' : 'Deduction';
                $quantityChange = abs($newQuantity - $oldQuantity);

                Inventory_Log::create([
                    'stock_id' => $stock->stock_id,
                    'reference_type' => 'Order',
                    'order_reference_id' => null,
                    'transaction_type' => $transactionType,
                    'quantity' => $quantityChange,
                    'transaction_date' => now(),
                ]);
            }
        });
    }
}