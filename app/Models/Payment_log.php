<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment_log extends Model
{
    protected $table = 'payment_logs'; // Nama tabel di database

    protected $primaryKey = 'payment_id';

    protected $keyType = 'int';

    protected $fillable = ['order_id', 'payment_amount', 'payment_date', 'payment_method'];
    public $timestamps = false; // Sesuaikan dengan kolom di tabel
}
