<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = ['name','email','post_id','comment','parent_comment','commentor'];

    public function posts(){
        return $this->belongsTo('App\Comment', 'post_id','id');
    }


    public function getChildCommentAttribute(){
        // child_comment
       return $this->where('parent_comment',$this->id)->get();
    }
}
