<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices'; 

    protected $primaryKey = 'invoice_id';

    protected $keyType = 'int';

    protected $fillable = ['invoice_date', 'customer_id', 'total_price', 'payment_status']; 
}

//deleting later