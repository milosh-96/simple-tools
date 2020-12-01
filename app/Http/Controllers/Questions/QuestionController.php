<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\StoreQuestionRequest;
use App\Models\Questions\Question;
use App\ViewModels\Questions\SingleQuestionPageViewModel;
use App\ViewModels\StaticPages\StaticPageViewModel;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show(Question $question)
    {
        //return $question;
        $data = ["viewModel"=>new SingleQuestionPageViewModel($question)];
        return view('questions.show')->with($data);
    }

    public function store(StoreQuestionRequest $request)
    {
        $request->merge(["user_id"=>auth()->user()->id]);
        $request->merge(["choices"=>json_encode($request->input("choices"))]);

        //return($request->all());
        $question = Question::create($request->all());
        session()->flash("status","Great! Your have posted a question. Share it on social media and invite people to vote.");
        return redirect()->route('question.show',["question"=>$question->slug]);
    }
}
