<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        # return parent::toArray($request);

        return [
            'id'             => $this->id,
            'commenter_name' => $this->name,
            'commenter_email'=> $this->email,
            'comment_content'=> $this->comment,
            'commentor'      => $this->commentor,
            'child_comment'  => self::collection($this->child_comment),
            'parent_comment' => $this->parent_comment,
            'publish_data'   => Date('M d ,Y',strtotime($this->created_at)),

        ];
    }
}
