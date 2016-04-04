<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Problem extends Model
{
    protected $table = "problems";

    protected $fillable = ['name','description', 'state','user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function scopeSearchName($query, $name){
        return $query->where('name','LIKE',"%$name%");
    }
}
