<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_log extends Model
{
    protected $table = 'order_logs';

    protected $primaryKey = 'order_log_id';

    protected $keyType = 'int';

    protected $fillable = [
        'customer_id',
        'order_date',
        'completion_date',
        'status',
    ];

    public $timestamps = false; // Sesuaikan dengan kolom di tabel
}
