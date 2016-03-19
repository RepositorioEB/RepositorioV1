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

}
