<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    //
    static function CreatePostImage($post,$image){
        $image_name = 'post-'.time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('public/post-image/',$image_name);
        $post->image()->create([
           'imageable_id'   =>$post->id ,
           'imageable_type' =>'App\Post',
           'media_link'     =>'post-image/'.$image_name
        ]);
    }
}
