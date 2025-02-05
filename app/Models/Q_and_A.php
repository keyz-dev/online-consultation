<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Q_and_A extends Model
{
    protected $table = "q_and_as";
    protected $fillable = [
        'question', 
        'answer', 
    ];
}
