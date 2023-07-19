<?php

use App\Http\Controllers\Auth\AuthController;
use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;

use function PHPUnit\Framework\assertFalse;

class LoginTest extends \Codeception\Test\Unit
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
    public function testLoginNotExistUser()
    {


        $credentials = ['email' => "notexist@mail.ru", 'password' => "fake_password"];
        $this->assertFalse(auth()->attempt($credentials));


    }

    public function testLoginExistUser()
    {

        $existUser = User::find(1);
        $credentials = ['email' => $existUser->email, 'password' => "qweqwe"];
        $this->assertIsString(auth()->attempt($credentials));


    }

    public function testLoginWrongPassword()
    {
        $existUser = User::find(1);
        $credentials = ['email' => $existUser->email, 'password' => "wrong_password"];
        $this->assertFalse(auth()->attempt($credentials));

    }

    public function testLoginEmptyData()
    {
        $this->assertFalse(auth()->attempt(['email' => '', 'password' => '']));
    }
}
