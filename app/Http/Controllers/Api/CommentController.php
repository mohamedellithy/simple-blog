<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;
use App\Comment;
class CommentController extends Controller
{
    //

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
             'name'    => 'required',
             'email'   => 'required|email',
             'comment' => 'required',
             'post_id' => 'required',
        ]);

        $comment = Comment::Create($request->all());
        return new CommentResource($comment);
    }
}
