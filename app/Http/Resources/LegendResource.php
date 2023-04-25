<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LegendResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'stats' => new StatResource($this->stats),
            'weapons' => [
                new WeaponResource($this->first_weapon),
                new WeaponResource($this->second_weapon)
            ],
            'history' => $this->history
        ];
    }
}
