<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;


class UserService
{

    function store($data)
    {

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
            $user->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();

        }
        return $user;
    }

}
