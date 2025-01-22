<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $table = "specialties";
    protected $fillable = [
        'name',
        'icon_url',
        'description',
    ];

    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
}
