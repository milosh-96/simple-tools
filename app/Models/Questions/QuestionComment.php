<?php

namespace App\Models\Questions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{
    protected $fillable = ["body"];
    public function question()
    {
        return $this->belongsTo("App\Models\Questions\Question");
    }

    public function user() {
        return $this->belongsTo("App\Models\User");
    }


}
