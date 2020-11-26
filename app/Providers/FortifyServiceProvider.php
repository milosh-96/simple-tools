<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use \App\ViewModels\Auth\Account\LoginPageViewModel;
use App\ViewModels\Auth\Account\RegistrationPageViewModel;
use App\ViewModels\StaticPages\StaticPageViewModel;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
Fortify::loginView(function () {
    $data = ["viewModel"=>new LoginPageViewModel];

    return view('account.login')->with($data);
});
Fortify::registerView(function () {
    $data = ["viewModel"=>new RegistrationPageViewModel];

    return view('account.register')->with($data);
});

Fortify::verifyEmailView(function () {
    $viewModel = new StaticPageViewModel();
    $viewModel->setTitle("Confirm Account");
    $viewModel->setTagline("Thank you for registering. We sent you an email with the verification link.");
    $data = ["viewModel"=>$viewModel];
    return view('account.verify')->with($data);
});

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
    }
}
