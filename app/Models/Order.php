<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'order_id';

    protected $keyType = 'int';

    protected $attributes = [
        'status' => 'Diproses', // Default status
    ];

    protected $fillable = ['customer_id', 'order_date', 'completion_date', 'status'];
    public $timestamps = false; // Jika tabel tidak memiliki `created_at` dan `updated_at`

}
