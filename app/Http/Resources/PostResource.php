<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\CommentResource;
class PostResource extends JsonResource
{
    public static $wrap = 'posts';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        // return parent::toArray($request);
        return [
            'id'              => $this->id,
            'title'           => $this->title,
            'excerpt'         => $this->excerpt,
            'image'           => $this->image ? asset('storage/'.$this->image->media_link) : '',
            'category'        => $this->category ,
            'author'          => $this->author->name,
            'content'         => $this->content,
            'publish_data'    => Date('M d ,Y',strtotime($this->created_at)),
            'comments'        => CommentResource::collection($this->head_comments),
            'count_comments'  => $this->comments->count(),
        ];
    }

}
