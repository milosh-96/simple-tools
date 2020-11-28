<?php

namespace App\Http\Controllers;

use App\Http\Requests\Texts\ReverseTextRequest;
use Illuminate\Http\Request;
use App\ViewModels\Texts\NotesPageViewModel;
use App\ViewModels\Texts\ReverseTextViewModel;
use Illuminate\Support\Facades\Validator;

class TextController extends Controller
{
    public function notes() {
        $data = ["viewModel"=>new NotesPageViewModel];
        return view('text.notes')->with($data);
    }
    public function reverseText(ReverseTextRequest $request)
    {
        if($request->isMethod(("POST"))) {
        return $request->validated();
        }
        $data = ["viewModel"=>new ReverseTextViewModel];
        return view('text.reverse-text')->with($data);
    }
}
