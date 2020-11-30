<?php

namespace App\Models\Questions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ["title","description","choices","user_id"];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function getTitle()
    {
        return $this->attributes["title"];
    }
    public function getDescription()
    {
        return $this->attributes["description"];
    }
    public function getChoicesArray()
    {
        return json_decode($this->attributes["choices"]);
    }

    public function getHumanDateOfPosting() {
        return $this->created_at->diffForHumans();
    }
}
