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
        "upvoteCount": "0",
        "text": "{{$viewModel->getQuestion()->getDescription()}}",
        "dateCreated": "{{$viewModel->getQuestion()->created_at}}",
        "author": {
            "@type": "Person",
            "name": "{{$viewModel->getQuestion()->user->user_name}}"
        },
        "answerCount": "2",
        "suggestedAnswer": {
            "@type": "ItemList",
            "numberOfItems": "2",
            "itemListElement":[
                {
                "@type": "ListItem",
                "position": 1,
                "item": {
                    "@type": "Answer",
                        "upvoteCount": "0",
                        "name": "{{$viewModel->getQuestion()->getChoicesArray()[0]}}",
                        "text": "{{$viewModel->getQuestion()->getChoicesArray()[0]}}",
                        "dateCreated": "2010-12-01T22:01Z",
                        "author": {
                            "@type": "Person",
                            "name": "{{$viewModel->getQuestion()->user->user_name}}"
                        }
                }},
                {
                "@type": "ListItem",
                "position": 2,
                "item": {
                        "@type": "Answer",
                        "upvoteCount": "0",
                        "name": "{{$viewModel->getQuestion()->getChoicesArray()[1]}}",
                        "text": "{{$viewModel->getQuestion()->getChoicesArray()[1]}}",
                        "dateCreated": "2010-12-01T22:01Z",
                        "author": {
                            "@type": "Person",
                            "name": "{{$viewModel->getQuestion()->user->user_name}}"
                        }
                }
            }]
        }
    }
    </script>
@endsection
