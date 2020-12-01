<?php

namespace App\Models\Questions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;

    protected $fillable = ["choice_index","choice_value"];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function question() {
        return $this->belongsTo('App\Models\Questions\Question');
    }
}
