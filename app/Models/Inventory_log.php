<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory_log extends Model
{
    protected $table = 'inventory_logs';

    protected $primaryKey = 'transaction_id';

    protected $keyType = 'int';

    protected $fillable = ['stock_id', 'reference_type', 'transaction_type', 'quanitity', 'transaction_date'];
}
