<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'patient_id', 
        'doctor_id',
        'slot_id', 
        'status'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function slot(){
        return $this->hasOne(Slot::class);
    }
}
