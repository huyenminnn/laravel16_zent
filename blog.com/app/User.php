<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //quan he 1-1
    // public function mobile(){
    //     return $this->hasOne('App\Mobile', 'user_id', 'id'); //neu ten cot ko dung chuan, can 2 tham so sau
    // }

    //quan he 1-n
    // public function courses(){
    //     return $this->hasMany('App\Course');   //tra ve mang object
    // }
    
    //quan he n-n
    // public function courses(){
    //     return $this->belongsToMany('App\Course','users_courses','user_id','course_id');
    // }

    //1 user có nhiều post
    public function post(){
        return $this->hasMany('App\Post','user_id','id');
    }
}
