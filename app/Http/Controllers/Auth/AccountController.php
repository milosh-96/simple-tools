<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\ViewModels\Auth\Account\LoginPageViewModel;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function login()
    {
        $data = ["viewModel"=>new LoginPageViewModel];
        return view('account.login')->with($data);
    }
}
