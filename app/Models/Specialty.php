<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $table = "specialties";
    protected $fillable = [
        'name',
        'noun',
        'icon_url',
        'description',
    ];

    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
    
    public function symptoms(){
        return $this->hasMany(HealthConcern::class);
    }
}
