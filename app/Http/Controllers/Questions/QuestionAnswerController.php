<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\AnswerQuestionRequest;
use App\Models\Questions\Question;
use App\Models\Questions\QuestionAnswer;
use Exception;
use Illuminate\Http\Request;

class QuestionAnswerController extends Controller
{
    public function store(Question $question,AnswerQuestionRequest $request)
    {
        try {
            $answer = new QuestionAnswer($request->all());
            $answer->user()->associate(auth()->user());
            $answer->question()->associate($question);
            $answer->save();
            //return $answer;
            session()->flash("status","Thank you for voting!");
            return redirect()->back();
        }
        catch(Exception $e) {
            session()->flash("status","You have already voted.");
            return redirect()->back();
        }

        // todo : implement validator//
    }

}
