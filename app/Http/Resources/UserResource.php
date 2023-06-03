<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'steam_link' => $this->steam_link,
            'about' => $this->about,
            'elo' => $this->elo,
            'avatar' =>  url('storage/' . $this->avatar),
            'is_admin' => $this->is_admin,
            'created_at' => date(' D M, Y', strtotime($this->created_at)),

        ];
    }
}
