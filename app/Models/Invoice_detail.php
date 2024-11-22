<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice_detail extends Model
{
    protected $table = 'invoice_details'; // Nama tabel di database

    protected $primaryKey = 'invoice_detail_id';

    protected $keyType = 'int';

    protected $fillable = ['invoice_id', 'order_id']; // Sesuaikan dengan kolom di tabel
}
//deleting later