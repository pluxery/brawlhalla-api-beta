<?php

namespace App\Http\Controllers\ResourceControllers;

use App\Http\Resources\WeaponResource;
use App\Models\Weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{


    public function index()
    {
        return WeaponResource::collection(Weapon::all());
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Weapon $weapon)
    {
        //
    }


    public function update(Request $request, Weapon $weapon)
    {
        //
    }

    public function destroy(Weapon $weapon)
    {
        //
    }
}
