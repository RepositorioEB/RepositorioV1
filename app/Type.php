<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Ova;

class Type extends Model
{
	protected $table = "types";

    protected $fillable = ['name'];

	public function ovas()
    {
        return $this->hasMany('App\Ova');
    }
    
    public function scopeSearchType($query, $name){
        return $query->where('name','LIKE',"%$name%");
    }
    public function scopeSearchTypeDescription($query, $description){
        return $query->where('description','LIKE',"%$description%");
    }
}
