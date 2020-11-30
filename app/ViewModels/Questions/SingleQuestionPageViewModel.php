<?php

namespace App\ViewModels\Questions;

use App\Models\Questions\Question;

class SingleQuestionPageViewModel extends \App\ViewModels\BasePageViewModel
{

    private $question;
     public function __construct(Question $question)
    {
        $this->setQuestion($question);
        $this->setTitle("Question: ".$this->getQuestion()->title);
    }

    public function getQuestion() {
        return $this->question;
    }

    public function setQuestion(Question $question) {
        $this->question = $question;
    }
}
