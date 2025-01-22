<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'recipient_id',
        'type',
        'title',
        'content',
        'status',
        'sent_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
