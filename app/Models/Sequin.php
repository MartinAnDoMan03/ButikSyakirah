<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sequin extends Model
{
    protected $table = 'sequin'; // Nama tabel di database

    protected $primaryKey = 'sequin_id';

    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = ['order_id', 'sequin_name', 'sequin_price', 'sequin_status']; // Sesuaikan dengan kolom di tabel
}
