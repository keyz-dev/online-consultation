<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'number',
        'type'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
