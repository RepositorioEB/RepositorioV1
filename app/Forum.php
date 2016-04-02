<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Forum extends Model
{
    protected $table = "forums";

    protected $fillable = ['name','characteristic','user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function scopeSearchForum($query, $name){
        return $query->where('name','LIKE',"%$name%");
    }
    public function scopeSearchForumCharacteristic($query, $characteristic){
        return $query->where('characteristic','LIKE',"%$characteristic%");
    }
}
