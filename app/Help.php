<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $table = "helps";

    protected $fillable = ['name','video','description','user_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function scopeSearchName($query, $name){
        return $query->where('name','LIKE',"%$name%");
    }
    public function scopeSearchVideo($query, $video){
        return $query->where('video','LIKE',"%$video%");
    }
    public function scopeSearchDescription($query, $description){
        return $query->where('description','LIKE',"%$description%");
    }
}
