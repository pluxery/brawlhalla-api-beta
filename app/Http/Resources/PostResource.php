<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'author' => new UserResource($this->author),
            'content' => $this->content,
            'likes' => $this->likes,
            'category' => new CategoryResource($this->category),
            'tags' => TagResource::collection($this->tags),
            'created_at' => date(' D M, Y', strtotime($this->created_at)),
            'updated_at' => date(' D M, Y', strtotime($this->updated_at)),
            'comments' => CommentResource::collection($this->comments)
        ];
    }
}
