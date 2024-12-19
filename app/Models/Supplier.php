<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    protected $table = 'Suppliers'; 

    protected $primaryKey = 'supplier_id';
    protected $fillable = ['supplier_name', 'contact_info', 'address']; 
    public $timestamps = false;
   
}
