<?php

namespace App\Services;

use App\Http\Filters\LegendFilter;
use App\Models\Legend;
use App\Models\Stat;
use App\Models\Weapon;
use Illuminate\Support\Facades\DB;

class LegendService
{
    function index($data)
    {
        $filter = app()->make(LegendFilter::class, ['queryParams' => array_filter($data)]);
        return Legend::filter($filter)->get()->all();

    }

    function store($data)
    {
        try {
            //TODO add stats to create(...)
            DB::beginTransaction();

            $firstWeaponId = Weapon::firstOrCreate($this->parseWeapon($data['first_weapon']))->id;
            $secondWeaponId = Weapon::firstOrCreate($this->parseWeapon($data['second_weapon']))->id;

            $legend = Legend::create([
                'name' => $data["name"],
                'image' => $data["image"],
                'history' => $data["history"],
                'first_weapon_id' => $firstWeaponId,
                'second_weapon_id' => $secondWeaponId,

            ]);
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $legend;

    }

    function update($data, Legend $legend)
    {
        try {
            //TODO add stats to update(...)
            DB::beginTransaction();

            $firstWeaponId = Weapon::firstOrCreate($this->parseWeapon($data['first_weapon']))->id;
            $secondWeaponId = Weapon::firstOrCreate($this->parseWeapon($data['second_weapon']))->id;
            $legend->update([
                'name' => $data["name"],
                'image' => $data["image"],
                'history' => $data["history"],
                'first_weapon_id' => $firstWeaponId,
                'second_weapon_id' => $secondWeaponId,
            ]);
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $legend;


    }

    private function parseWeapon(array $weapon): array
    {
        return [
            'name' => $weapon['name'],
            'image' => $weapon['image'],
        ];
    }

    
}
