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

    // relasi search data pesanan
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id'); // Gantilah 'customer_id' jika kolom foreign key-nya berbeda
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id'); // Sesuaikan nama kolom kunci asing
    }

    public function penjahit()
    {
        return $this->belongsTo(User::class, 'penjahit_id');
    }

    // Menambahkan fungsi untuk mengambil penjahit berdasarkan role
    public function getPenjahit()
    {
        // Mengambil penjahit berdasarkan role 'penjahit' di tabel users
        return User::where('role', 'penjahit')->first();
    }

    public function sizeDetails()
    {
        return $this->hasMany(Size_detail::class, 'order_id');
    }

}
