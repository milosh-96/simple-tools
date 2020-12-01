<?php

namespace App\Models\Questions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{
    public function question()
    {
        return $this->belongsTo("App\Models\Questions\Question");
    }
}
