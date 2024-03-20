<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'avatar', 'phone_number', 'gender', 'address', 'no_rekening'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTakeAvatarAttribute()
    {
        if (!$this->avatar) {
            return asset('assets/img/avatar/avatar-2.png');
        }
        return "/storage/" . $this->avatar;
    }
}
