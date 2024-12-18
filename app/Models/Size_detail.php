<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size_detail extends Model
{
    protected $table = 'size_details'; 

    protected $primaryKey = 'size_detail_id';

    protected $keyType = 'int';

    protected $fillable = ['order_id', 'waist_circumference', 'arm_circumference', 'body_height', 'shoulder_width', 'chest_circumference', 'arm_length']; 

    public $timestamps = false;
}
