<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\StoreCommentRequest;
use App\Models\Questions\Question;
use App\Models\Questions\QuestionComment;
use Illuminate\Http\Request;

class QuestionCommentController extends Controller
{
    public function store(StoreCommentRequest $request, Question $question) {
        $questionComment = new QuestionComment(request()->all());
        $questionComment->user()->associate(auth()->user());
        $questionComment->question()->associate($question);
         $questionComment->save();
         return view('questions.components.comments.comment')->with(["comment"=>$questionComment]);
    }
}
