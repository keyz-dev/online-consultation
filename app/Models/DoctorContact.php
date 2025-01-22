<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorContact extends Model
{
    protected $table = "doctor_contacts";
    protected $fillable = [
        'doctor_id',
        'contact_id',
        'value'
    ];
}
