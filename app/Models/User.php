<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verification_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
   public function setPasswordAttribute($value)
   {
       $this->attributes['password'] = $value;
   }
}
