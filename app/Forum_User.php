<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum_User extends Model
{
    protected $table = "forum_user";

    protected $fillable = ['user_id','forum_id','messaje'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function foro()
    {
    	return $this->belongsTo(Forum::class);
    }
}