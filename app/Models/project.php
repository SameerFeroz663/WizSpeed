<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = [
    'project_name',
    'client_name',
    'assign_to',
    'price',
    'user',
    'start_date',
    'end_date',
];
}
