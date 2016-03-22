<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ova_Evaluation extends Model
{
    protected $table = "ovas_evaluations";

    protected $fillable = ['user_id','ova_id','punctuation'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
