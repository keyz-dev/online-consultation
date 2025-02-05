<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserContact extends Pivot
{
    protected $table = "user_contacts";
    protected $fillable = [
        'value'
    ];
}
