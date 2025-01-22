<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'user_id',
        'specialty_id',
        'payment_id',
        'experience',
        'rating',
        'description',
        'license_number',
        'hospital',
        'consultation_fee'            
    ] ;

    public function contact(){
        return $this->belongsToMany(ContactInformation::class, 'doctor_contacts')
        ->using(DoctorContact::class)
        ->withPivot('value')
        ->withTimestamps();
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function appointments(){
        return $this->hasMany(Appointment::class,'doctor_id');
    }

    public function availability(){
        return $this->hasMany(Availability::class);
    }

    public function specialty(){
        return $this->belongsTo(Specialty::class);
    }

    public function consultations(){
        return $this->hasMany(Consultation::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class,'payment_id');
    }
}
