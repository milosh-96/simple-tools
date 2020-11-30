@extends('layout.main')
@section('content')
   <div>
    <h1>{{$viewModel->getQuestion()->getTitle()}}</h1>
    <p>{{$viewModel->getQuestion()->getDescription()}}</p>
    <hr>
    <div>
        <small>{{$viewModel->getQuestion()->getHumanDateOfPosting()}}</small>
        <small>by {{$viewModel->getQuestion()->user->user_name}}</small>
    </div>
    <div class="buttons">
        <button class="button primary">{{$viewModel->getQuestion()->getChoicesArray()[0]}}</button>
        <button class="button primary">{{$viewModel->getQuestion()->getChoicesArray()[1]}}</button>
    </div>
</div>

    <hr style="margin-bottom: 150px">
    <h2>Comments</h2>
    <textarea name="comment" id="comment" cols="30" rows="2" placeholder="What do you think?"></textarea>
@endsection

@section('additionalHead')
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Question",
        "name": "{{$viewModel->getQuestion()->getTitle()}}",
        "upvoteCount": "196",
        "text": "{{$viewModel->getQuestion()->getDescription()}}",
        "dateCreated": "{{$viewModel->getQuestion()->created_at}}",
        "author": {
            "@type": "Person",
            "name": "{{$viewModel->getQuestion()->user->user_name}}"
        },
        "answerCount": "2",
        "acceptedAnswer": {
            "@type": "Answer",
            "upvoteCount": "1337",
            "text": "(The text of the accepted answer goes here...).",
            "dateCreated": "2010-12-01T22:01Z",
            "author": {
                "@type": "Person",
                "name": "someuser"
            }
        },
        "suggestedAnswer": {
            "@type": "Answer",
            "upvoteCount": "39",
            "text": "(The text of the accepted answer goes here...).",
            "dateCreated": "2010-12-06T21:11Z",
            "author": {
                "@type": "Person",
                "name": "lonelyuser1234"
            }
        }
    }
    </script>
@endsection
