<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class PostCollectionResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
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
            'image' => $this->image ? url('storage/' . $this->image) : null,
            'author' => [
                'id' => $this->author->id,
                'name' => $this->author->name
            ],
            //'content' => $this->content,
            'likes' => $this->likes->count(),
            'category' => new CategoryResource($this->category),
            'tags' => TagResource::collection($this->tags),
            'created_at' => date(' D M, Y', strtotime($this->created_at)),
            'updated_at' => date(' D M, Y', strtotime($this->updated_at)),
            'comments' => $this->comments->count()
        ];
    }
}
