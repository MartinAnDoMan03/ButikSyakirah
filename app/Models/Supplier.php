<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'Suppliers'; 

    protected $primaryKey = 'supplier_id';

    protected $keyType = 'int';

    protected $fillable = ['supplier_name', 'contact_info', 'address']; 
}
