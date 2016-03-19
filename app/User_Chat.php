<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Chat extends Model
{
    protected $table = "users_chats";

    protected $fillable = ['nameorigen','namedestino','mensaje'];

    public function user()
    {
    	return $this->belongsTo(User_chat::class);
    }
}

