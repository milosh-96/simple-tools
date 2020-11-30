<?php

namespace App\Http\Controllers;

use App\Models\Questions\Question;
use App\ViewModels\StaticPages\StaticPageViewModel;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show($question)
    {
        $data = ["viewModel"=>new StaticPageViewModel];
        return view('questions.show')->with($data);
    }
}
