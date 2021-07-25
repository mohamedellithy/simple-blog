<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title','excerpt','content','author_id'];
    /**
     * Get the post's image.
     */
    public function image()
    {
        return $this->morphOne(Images::class, 'imageable');
    }

    public function category(){
        return $this->belongsToMany('App\Category', 'category_posts','post_id','category_id');
    }

    public function author(){
        return $this->belongsTo('App\User', 'author_id','id');
    }

    public function comments(){
        return $this->hasMany('App\Comment', 'post_id','id');
    }

    public function getHeadCommentsAttribute(){
        // head_comments
        return $this->comments->whereNULL('parent_comment');
    }
}
