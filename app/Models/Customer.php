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

    protected $fillable = [
        'customer_name',
        'address',
        'phone',
        'email',
        'created_at',
        'updated_at']; // Sesuaikan dengan kolom di tabel


        // search by nama customer di data pesanan
        use HasFactory;

        // Relasi ke Order
        public function orders()
        {
            return $this->hasMany(Order::class, 'customer_id'); // Sesuaikan nama kolom foreign key
        }
        
}
