<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LegendResource extends JsonResource
{

    public function toArray($request) {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image ? url('storage/' . $this->image) : null,
            'main_image' => $this->main_image ? url('storage/' . $this->main_image) : null,
            'attack' => $this->attack,
            'defend' => $this->defend,
            'dexterity' => $this->dexterity,
            'speed' => $this->speed,
            'weapons' => [
                new WeaponResource($this->first_weapon),
                new WeaponResource($this->second_weapon)
            ],
            'history' => $this->history,
            'rating' => $this->rated_users->count() === 0 ? 0 :
                $this->rated_users->sum('rating') / $this->rated_users->count(),
            'price' => $this->price

        ];
    }
}