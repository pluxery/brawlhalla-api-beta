<?php

namespace Tests\unit;

use App\Http\Actions\AddSubscription;
use App\Http\Actions\DeleteSubscription;
use App\Models\Subscription;
use Codeception\Test\Unit;
use Tests\arrangers\UserArranger;

class SubbscriberTest extends Unit
{
    public function testAdd()
    {
        $user = UserArranger::create();
        auth()->setUser($user);

        $user2 = UserArranger::create();

        $sut = new  AddSubscription ($user2);
        $result = Subscription::query()->where(['user_id' => $user->id, 'subscription_id' => $user2->id])->firstOr(
            function () {
                return null;
            }
        );

        self::assertNotEmpty($result);
        self::assertEquals($result->id, $user2->id);

        $user->delete();
        $user2->delete();


    }

    public function testAddDouble()
    {
        $user = UserArranger::create();
        auth()->setUser($user);

        $user2 = UserArranger::create();

        try {
            $sut = new AddSubscription ($user2);
            self::fail();
        } catch (\Exception $e) {

        }


        $user->delete();
        $user2->delete();
    }


    public function testDelete()
    {
        $user = UserArranger::create();
        auth()->setUser($user);

        $user2 = UserArranger::create();

        $add = new  AddSubscription($user2);
        $sut = new DeleteSubscription($add);

        $result = Subscription::query()->where(
            ['user_id' => $user->id, 'subscription_id' => $user2->id])
            ->firstOr(
                function () {
                    return null;
                }
            );

        self::assertEmpty($result);

        $user->delete();
        $user2->delete();
    }

}
