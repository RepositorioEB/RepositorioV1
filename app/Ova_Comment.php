<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ova_Comment extends Model
{
    protected $table = "ovas_comments";

    protected $fillable = ['ova_id','user_id','comment'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function ova()
    {
    	return $this->belongsTo('App\Ova');
    }
}
