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
            'attack' => $this->attack,
            'defend' => $this->defend,
            'dexterity' => $this->dexterity,
            'speed' => $this->speed,
            'weapons' => [
                new WeaponResource($this->first_weapon),
                new WeaponResource($this->second_weapon)
            ],
            'history' => $this->history,
            'rating' => $this->rating

        ];
    }
}
