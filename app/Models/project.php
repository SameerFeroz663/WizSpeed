<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = [
    'project_name',
    'client_name',
    'membership',
    'assign_to',
    'price',
    'start_date',
    'end_date',
    'user_id'
];

}
