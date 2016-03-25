<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Ova;

class Download extends Model
{
    protected $table = "downloads";

    protected $fillable = ['user_id','ova_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function ova()
    {
    	return $this->belongsTo('App\Ova');
    }
}
