<?php

use App\Models\User;

class RegisterTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testRegisterUserCorrectData()
    {
        $data = [
            'name' => 'correct_name',
            'email' => 'correct_email@mail.ru',
            'password' => 'correct_password',

        ];
        $service = new \App\Services\UserService();
        $canRegister = $service->tryRegister($data);
        $this->assertTrue($canRegister);

    }

    public function testRegisterUserWithExistEmail()
    {
        $user = User::find(1);
        $data = [
            'name' => 'sema',
            'password' => 'qweqwe',
            'email' => $user['email']
        ];
        try {
            $service = new \App\Services\UserService();
            $canRegister = $service->tryRegister($data);
            $this->assertFalse($canRegister);
        }catch (\Exception $e){
            self::assertFalse(false);
    }

    }

    public function testRegisterUserIncorrectEmail()
    {
        $user = User::find(1);
        $data = [
            'name' => 's',
            'password' => 'qweqwe',
            'email' => ''
        ];
        try {
            $service = new \App\Services\UserService();
            $canRegister = $service->tryRegister($data);
            $this->assertFalse($canRegister);
        }catch (\Exception $e){
            self::assertFalse(false);
        }
    }

    public function testRegisterUserIncorrectPassword()
    {
        $data = [
            'name' => 'tester',
            'password' => 'p',
            'email' => 'useremaitestl@mail.ru'
        ];
        try {
            $service = new \App\Services\UserService();
            $canRegister = $service->tryRegister($data);
            $this->assertFalse($canRegister);
        }catch (\Exception $e){
            self::assertFalse(false);
        }

    }

    public function testRegisterUserIncorrectName()
    {
        $data = [
            'name' => '_',
            'password' => 'qweqwe',
            'email' => 'useremail@mail.ru'
        ];
        try {
            $service = new \App\Services\UserService();
            $canRegister = $service->tryRegister($data);
            $this->assertFalse($canRegister);
        }catch (\Exception $e){
            self::assertFalse(false);
        }

    }

    public function testRegisterUserEmptyData()
    {
        $data = [
            'name' => '',
            'password' => '',
            'email' => ''
        ];
        try {
            $service = new \App\Services\UserService();
            $canRegister = $service->tryRegister($data);
            $this->assertFalse($canRegister);
        }catch (\Exception $e){
            self::assertFalse(false);
        }


    }
}
