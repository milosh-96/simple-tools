<?php

namespace App\Http\Controllers;

use App\Http\Requests\Texts\ReverseTextRequest;
use App\Services\TextService;
use Illuminate\Http\Request;
use App\ViewModels\Texts\NotesPageViewModel;
use App\ViewModels\Texts\ReverseTextViewModel;
use Faker\Provider\ar_JO\Text;
use Illuminate\Support\Facades\Validator;

class TextController extends Controller
{
    public function notes() {
        $data = ["viewModel"=>new NotesPageViewModel];
        return view('text.notes')->with($data);
    }
    public function reverseText(ReverseTextRequest $request)
    {
        $viewModel = new ReverseTextViewModel;
        if($request->validated()) {
            $viewModel->setFormSubmitted();
            $viewModel->setSubmittedValues($request->validated());
            $viewModel->setReverseOnlyWords($request->only_words);
            $reversedText = $viewModel->reverseText($request->text);
            $viewModel->setResult($reversedText);
        }
        $data = ["viewModel"=>$viewModel];
        return view('text.reverse-text')->with($data);
    }
}
