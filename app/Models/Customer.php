<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers'; // Nama tabel di database

    protected $primaryKey = 'customer_id';

    protected $keyType = 'int';

    protected $fillable = ['name', 'address', 'phone', 'email']; // Sesuaikan dengan kolom di tabel
}
