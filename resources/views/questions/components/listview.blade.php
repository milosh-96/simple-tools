<div class="list-view">
    @foreach(App\Models\Questions\Question::all() as $question)
     @include("questions.components.list-item",["question"=>$question])
    @endforeach
</div>
