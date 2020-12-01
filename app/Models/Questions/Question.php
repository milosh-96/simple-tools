<?php

namespace App\Models\Questions;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = ["title","description","choices","user_id"];




    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function answers() {
        return $this->hasMany('App\Models\Questions\QuestionAnswer');
    }

    public function comments() {
        return $this->hasMany("App\Models\Questions\QuestionComment");
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


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
