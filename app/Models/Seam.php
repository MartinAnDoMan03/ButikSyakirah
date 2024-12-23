<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seam extends Model
{
    protected $table = 'seams'; // Nama tabel di database

    protected $primaryKey = 'seam_id';

    protected $keyType = 'int';

    protected $fillable = ['order_detail_id', 'seam_name', 'cloth_type', 'seamer_id', 'seam_size','seam_status'];
    
    public $timestamps = false;// Sesuaikan dengan kolom di tabel
}
