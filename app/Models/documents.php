<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    protected $fillable = [
        'document_name',
        'project_id',
    ];
}
