<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\ViewModels\Auth\Account\LoginPageViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    //
    public function login()
    {

        if(request()->isMethod('post')) {
            return [Auth::attempt(['email' => "aaa@aaa.com", 'password' => "gregrge"])];
        }

        $data = ["viewModel"=>new LoginPageViewModel];
        return view('account.login')->with($data);
    }


}
