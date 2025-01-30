<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthConcern extends Model
{
    protected $table = "health_concerns";
    protected $fillable = [
        'name',
        'icon_url',
        'specialty_id'
    ];

    public function specialty(){
        return $this->belongsTo(Specialty::class);
    }
}   
