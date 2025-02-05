<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = [
        'availability_id',
        'status',
        'day',
        'start_time',
        'end_time'
    ];

    public function appointment(){
        return $this->belongsTo(Appointment::class);
    }

    public function availability(){
        return $this->belongsTo(Availability::class, 'availability_id');
    }
}
