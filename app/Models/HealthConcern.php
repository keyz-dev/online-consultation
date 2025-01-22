<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthConcern extends Model
{
    protected $table = "health_concerns";
    protected $fillable = [
        'name',
        'description',
        'icon_url',
        'speciality_id'
    ];
}   
