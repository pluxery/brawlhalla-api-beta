<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class UserService
{


    function tryRegister($data): bool//for only unit test RegisterTest
    {
        $data['avatar'] = 'users/default_avatar_bodwar.png';
        $user = User::create($data);
        $credentials = (['email' => $data['email'], 'password' => $data['password']]);
        if (!auth()->attempt($credentials)) {

            return false;
        }

        return true;
    }

    function update($data, User $user)
    {
        try {
            DB::beginTransaction();
            if (isset($data['favorite_legends'])) {
                $legendIds = $data['favorite_legends'];
                unset($data['favorite_legends']);
                $user->favoriteLegends()->sync($legendIds);
            }
            if (isset($data['avatar'])) {
                $data['avatar'] = Storage::disk('public')->put('/users', $data['avatar']);
            }
            $user->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();

        }
        return $user;
    }

}
