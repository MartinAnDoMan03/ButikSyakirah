<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks'; 

    protected $primaryKey = 'stock_id';

    protected $keyType = 'int';

    protected $fillable = ['stock_name', 'quantity']; 
}
