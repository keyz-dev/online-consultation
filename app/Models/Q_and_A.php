<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Q_and_A extends Model
{
    protected $table = "'q_and_a_s";
    protected $fillable = [
        'question', 
        'answer', 
    ];
}
