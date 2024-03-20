<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'role', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function getEmailVerifiedAtAttribute()
    // {
    //     return \Carbon\Carbon::parse($this->attributes['email_verified_at'])
    //         ->diffForHumans();
    // }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->format('d, M Y H:i');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])
            ->diffForHumans();
    }


    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
