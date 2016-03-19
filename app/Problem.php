<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Problem extends Model
{
    protected $table = "problems";

    protected $fillable = ['description', 'state','user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
