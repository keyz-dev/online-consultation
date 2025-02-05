<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'age',
        'dob',
        'Nationality',
        'city',
        'role',
        'profile_image'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'name',
            'password',
            'gender',
            'age',
            'dob',
            'Nationality',
            'city',
            'role',
            'profile_image'
        ];
    }

    public function notifications(){
        return $this->hasMany(Notification::class);
    }

    public function doctor(){
        return $this->hasOne(Doctor::class);
    }
    public function patient(){
        return $this->hasOne(Patient::class);
    }

    public function contacts(){
        return $this->belongsToMany(ContactInformation::class, 'user_contacts', 'user_id', 'contact_id')
        ->using(UserContact::class)
        ->withPivot('value')
        ->withTimestamps();
    }

    public function testimonial(){
        return $this->hasOne(Testimonial::class);
    }
}
