<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs'; 

    protected $primaryKey = 'job_id';

    protected $keyType = 'int';

    protected $fillable = ['user_id', 'job_type', 'start_date'];
}
