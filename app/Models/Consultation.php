<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'status'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function prescription(){
        return $this->hasOne(Prescription::class);
    }

    
}
