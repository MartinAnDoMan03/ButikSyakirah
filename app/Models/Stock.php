<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks'; 

    protected $primaryKey = 'stock_id';

    protected $fillable = [
        'stock_type',
        'stock_name',
        'quantity',
        'last_updated',
    ];

    public $timestamps = false; 
}
