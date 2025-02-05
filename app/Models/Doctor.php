<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'user_id',
        'specialty_id',
        'payment_id',
        'experience',
        'rating',
        'descriptions',
        'license_number',
        'hospital',
        'consultation_fee'            
    ] ;

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

    // This scope filters all the doctors that have alteast one  active availability for the 
    // current week
    public static function scopeActiveAvailabilities($query, $week_number = null){
      return $query->whereHas('availabilities', function($query) use ($week_number){
        $query->where('status', 'active');
        if(!is_null($week_number)){
            $query->where('week_number', $week_number);
        }else{
            $query->where('week_number', \Carbon\Carbon::now()->weekOfYear());
        }
      });
    }

    public function consultations(){
        return $this->hasMany(Consultation::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class,'payment_id');
    }
}
