<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'student',
        'email',
        'password',
        'password_state',
        'state',
        'password_temp'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected function tycState(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value  == 1 ? true : false,
            set: fn ($value) => $value ? 1 : 0,
        );
    }

    protected function passwordState(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value  == 1 ? true : false,
            set: fn ($value) => $value ? 1 : 0,
        );
    }

    protected function infoState(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value  == 1 ? true : false,
            set: fn ($value) => $value ? 1 : 0,
        );
    }

    protected function state(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value  == 1 ? true : false,
            set: fn ($value) => $value ? 1 : 0,
        );
    }

}
