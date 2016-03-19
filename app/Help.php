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
}
