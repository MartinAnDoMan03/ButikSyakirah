<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory_log extends Model
{
    protected $table = 'inventory_logs';

    protected $primaryKey = 'transaction_id';

    protected $keyType = 'int';

    protected $fillable = ['stock_id', 'reference_type', 'order_reference_id', 'supplier_reference_id', 'transaction_type', 'quantity', 'transaction_date'];

    public $timestamps = false; // Nonaktifkan timestamps
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}
