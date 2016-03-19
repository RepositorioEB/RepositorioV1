<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Ova;

class Category extends Model
{
	protected $table = "categories";

    protected $fillable = ['name'];

    public function ovas()
    {
        return $this->hasMany('App\Ova');
    }
}
