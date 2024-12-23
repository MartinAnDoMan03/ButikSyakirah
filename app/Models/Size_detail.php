<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size_detail extends Model
{
    protected $table = 'size_details'; 

    protected $primaryKey = 'size_detail_id';

    protected $keyType = 'int';

    protected $fillable = ['order_detail_id','chest_circumference', 'waist_circumference', 'arm_circumference', 'arm_length', 'shoulder_width','hip', 'wrist_circumference', 'shoulder_length']; 

    public $timestamps = false;
}
