<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\GetLoginUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {


    }

    public function boot(): void
    {
//        Fortify::createUsersUsing(CreateNewUser::class);
//        Fortify::authenticateUsing([GetLoginUser::class, 'login']);
//        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
//        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
//        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

    }
}
