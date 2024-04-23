<?php

namespace Tests\arrangers;

use App\Models\User;

class UserArranger
{

    static function create()
    {
        $data = [
            'id' => 1,
            'username' => 'test',
        ];
        return $user = User::create($data);
    }
}
