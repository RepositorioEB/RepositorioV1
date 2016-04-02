<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use App\Type;
use App\Category;
use App\Download;
use App\User;


class Ova extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    protected $table = "ovas";

    protected $fillable = ['name','language','description','archive','punctuation','state','type_id','category_id','user_id'];
            
    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function downloads()
    {
        return $this->hasMany('App\Download');
    }

    public function ovas_comments()
    {
        return $this->hasMany('App\Ova_Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeSearch($query, $name){
        return $query->where('name','LIKE',"%$name%");
    }
    public function scopeSearchDescription($query, $description){
        return $query->where('description','LIKE',"%$description%");
    }
    public function scopeSearchArchive($query, $archive){
        return $query->where('archive','LIKE',"%$archive%");
    }
}
