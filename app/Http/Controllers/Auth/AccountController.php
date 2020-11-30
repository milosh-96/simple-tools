<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\ViewModels\Auth\Account\LoginPageViewModel;
use App\ViewModels\Auth\Account\RegistrationPageViewModel;
use App\ViewModels\Auth\Account\EditProfilePageViewModel;
use App\ViewModels\StaticPages\StaticPageViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{


    public function editProfile()
    {
        $data = ["viewModel"=>new EditProfilePageViewModel];
        return view('account.edit-profile')->with($data);
    }
    public function editPassword()
    {
        $viewModel = new StaticPageViewModel();
    $viewModel->setTitle("Reset Password");
    $viewModel->setTagline("This the last step in the password reset process. Enter your new password below.");
    $data = ["viewModel"=>$viewModel];
    return view('account.edit-password')->with($data);
    }


}
