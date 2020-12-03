<div class="list-view">
    @foreach($question->comments as $comment)
        <div class="comment callout">
            @include('questions.components.comments.comment',["comment"=>$comment])
        </div>
    @endforeach
</div>
