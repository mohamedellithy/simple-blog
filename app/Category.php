<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name','description','id'];

    public function posts(){
        return $this->belongsToMany('App\Post', 'category_posts','category_id','post_id');
    }
}
