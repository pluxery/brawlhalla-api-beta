<?php

namespace Tests\arrangers;

use App\Models\User;

class UserArranger
{

    static function create()
    {
        $data = [
            'username' => 'test',
            'email' => 'test@test.com',
        ];
        return $user = User::create($data);
    }
}
