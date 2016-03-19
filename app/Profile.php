<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Profile extends Model
{
    protected $table = "profiles";

    protected $fillable = ['name','characteristic'];

    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
