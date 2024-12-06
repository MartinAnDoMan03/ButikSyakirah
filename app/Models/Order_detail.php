<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_details';

    protected $primaryKey = 'order_detail_id';

    protected $keyType = 'int';

    protected $fillable = ['order_id', 'customere_cloth', 'shop_cloth', 'sequin', 'price', 'stock',]; 
}
