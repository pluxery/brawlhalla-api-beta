<?php

namespace App\Services;

use App\Http\Filters\LegendFilter;
use App\Models\Legend;

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
            DB::beginTransaction();
            $firstWeaponId = Weapon::firstOrCreate($data['first_weapon'])->id;
            $secondWeaponId = Weapon::firstOrCreate($data['second_weapon'])->id;
            $legend = Legend::create([
                "name" => $data["name"],
                "image" => $data["image"],
                "main_image" => $data["main_image"],
                "history" => $data["history"],
                "first_weapon_id" => $firstWeaponId,
                "second_weapon_id" => $secondWeaponId,
                'attack' => $data["attack"],
                'dexterity' => $data["dexterity"],
                'defend' => $data["defend"],
                'speed' => $data["speed"],
                'price' => $data["price"],

            ]);
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
           // dd($exception->getMessage());
            return $exception->getMessage();
        }
        return $legend;

    }

    function update($data, Legend $legend)
    {
        try {
            DB::beginTransaction();
//            $firstWeaponId = Weapon::firstOrCreate($data['first_weapon'])->id;
//            $secondWeaponId = Weapon::firstOrCreate($data['second_weapon'])->id;
            $legend->update([
                "name" => $data["name"],
                "image" => $data["image"],
                "main_image" => $data["main_image"],
                "history" => $data["history"],
                "first_weapon_id" =>$data["first_weapon_id"],
                "second_weapon_id" => $data["second_weapon_id"],
                'attack' => $data["attack"],
                'dexterity' => $data["dexterity"],
                'defend' => $data["defend"],
                'speed' => $data["speed"],
                'price' => $data["price"],
            ]);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
        return $legend;


    }




}
