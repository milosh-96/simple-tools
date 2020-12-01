<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Models\Questions\Question;
use App\Models\Questions\QuestionAnswer;
use Illuminate\Http\Request;

class QuestionAnswerController extends Controller
{
    public function store(Question $question,Request $request)
    {
        $answer = new QuestionAnswer($request->all());
        $answer->user()->associate(auth()->user());
        $answer->question()->associate($question);
        //return $answer;
        return redirect()->back();

        // todo : implement validator//
    }

}
