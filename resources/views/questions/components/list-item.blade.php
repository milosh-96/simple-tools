<div class="item callout">
    <h3>
        <a href="{{route('question.show',$question->slug)}}">
            {{$question->getTitle()}}
        </a>
    </h3>
    <em>{{$question->getHumanDateOfPosting()}}</em>
</div>
