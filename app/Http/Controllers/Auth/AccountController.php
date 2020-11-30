<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\ViewModels\Auth\Account\LoginPageViewModel;
use App\ViewModels\Auth\Account\RegistrationPageViewModel;
use App\ViewModels\EditProfilePageViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{


    public function editProfile()
    {
        $data = ["viewModel"=>new EditProfilePageViewModel];
        return view('account.edit-profile')->with($data);
    }


}
