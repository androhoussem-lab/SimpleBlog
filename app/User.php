<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','mobile', 'password' , 'avatar'
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
    public function posts(){
        return $this->hasMany(Post::class , 'user_id','id');
    }
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class,'user_id','id');
    }
    public function formatTimeForHuman(){
        return Carbon::createFromTimestamp(strtotime($this->created_at))->diffForHumans();
    }
}
