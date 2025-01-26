<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    protected $table = "contact_information";
    protected $fillable = [
        'name',
        'icone_url'
    ];

    public function doctor(){
        return $this->belongsToMany(Doctor::class, 'user_contacts', 'contact_id', 'user_id')
        ->using(UserContact::class)
        ->withPivot('value')
        ->withTimestamps();
    }
}
