<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\StoreQuestionRequest;
use App\Models\Questions\Question;
use App\ViewModels\Questions\SingleQuestionPageViewModel;
use App\ViewModels\StaticPages\StaticPageViewModel;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show(Question $question)
    {
        $data = ["viewModel"=>new SingleQuestionPageViewModel($question)];
        return view('questions.show')->with($data);
    }

    public function store(StoreQuestionRequest $request)
    {
        $request->merge(["user_id"=>auth()->user()->id]);
        $request->merge(["choices"=>json_encode($request->input("choices"))]);

        //return($request->all());
        $question = Question::create($request->all());
        return redirect()->route('question.show',["question"=>$question->id]);
    }
}
