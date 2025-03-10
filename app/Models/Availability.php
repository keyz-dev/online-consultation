<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $fillable = [
        'doctor_id',
        'status',
        'week_number'
    ];
    public function doctors(){
        return $this->belongsTo(Doctor::class);
    }

    public function slots(){
        return $this->hasMany(Slot::class);
    }
}
