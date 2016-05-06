<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = ['name','last_name','username','email','password','gender','date','photo','studies','country','role','profile_id'];
    protected $hidden = ['password', 'remember_token'];

    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }

    public function forums()
    {
        return $this->hasMany('App\Forum');
    }
    public function evaluations()
    {
        return $this->hasMany('App\OvaEvaluation');
    }

    public function downloads()
    {
        return $this->hasMany('App\Download');
    }
    public function ovas_comments()
    {
        return $this->hasMany('App\Ova_Comment');
    }
    public function problems()
    {
        return $this->hasMany('App\Problem');
    }

    public function helps()
    {
        return $this->hasMany('App\Help');
    }

    public function ovas()
    {
        return $this->hasMany('App\Ova');
    }

    public function comments()
    {
        return $this->belongsToMany('App\Forum');
    }

    public function scopeSearch($query, $name){
        return $query->where('name','LIKE',"%$name%");
    }
    public function scopeSearchUsername($query, $username){
        return $query->where('username','LIKE',"%$username%");
    }
}
