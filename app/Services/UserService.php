<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class UserService
{

    function update($data, User $user)
    {
        try {
            DB::beginTransaction();
            if (isset($data['favorite_legends'])) {
                $legendIds = $data['favorite_legends'];
                unset($data['favorite_legends']);
                $user->favoriteLegends()->sync($legendIds);
            }
            if (isset($data['avatar'])){
                $data['avatar'] = Storage::disk('public')->put('/post_images', $data['avatar']);
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
