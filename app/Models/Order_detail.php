<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $table = 'order_details';

    protected $primaryKey = 'order_detail_id';

    protected $keyType = 'int';

    protected $fillable = ['order_id', 'order_type', 'customer_cloth', 'store_cloth_type', 'store_cloth_length','seam_price', 'sequin','sequin_price', 'price', 'note',];

    public $timestamps = false;
}
