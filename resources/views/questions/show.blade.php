@extends('layout.main')
@section('content')
   <div id="question-page">
    <div>
        <small>{{$viewModel->getQuestion()->getHumanDateOfPosting()}}</small>
        <small>by {{$viewModel->getQuestion()->user->user_name}}</small>
    </div>
    <h1>{{$viewModel->getQuestion()->getTitle()}}</h1>

    <p>{{$viewModel->getQuestion()->getDescription()}}</p>
    <hr>

    <div class="buttons">
        @if(auth()->user())
        <div class="row">
            <div class="columns small-12 medium-6">
                <div class="row">
                <div class="columns small-6">
                    <form method="post" action="{{route('question.answer.store',[$viewModel->getQuestion()->slug])}}">
                        @csrf
                        <input type="hidden" name="choice_index" value="0">
                        <input type="hidden" name="choice_value" value="{{$viewModel->getQuestion()->getChoicesArray()[0]}}">
                        <button style="width:100%" class="button width-100 primary">{{$viewModel->getQuestion()->getChoicesArray()[0]}}</button>
                    </form>
                </div>
                <div class="columns small-6">
                    <form method="post" action="{{route('question.answer.store',[$viewModel->getQuestion()->slug])}}">
                        @csrf
                        <input type="hidden" name="choice_index" value="1">
                        <input type="hidden" name="choice_value" value="{{$viewModel->getQuestion()->getChoicesArray()[1]}}">
                        <button style="width:100%" class="button primary">{{$viewModel->getQuestion()->getChoicesArray()[1]}}</button>
                    </form>
                </div>
               </div>
            </div>

            </div>
            @else
            @include('layout.small-components.login-required',["message"=>"Login to vote"])
        @endif
        <hr>
        Total votes: 0
        </div>

    <hr style="margin-bottom: 80px">
    <h2>Comments</h2>
    @if(auth()->user())
    <form action="">
        <div class="input-group">
            <textarea name="comment" id="comment" cols="30" rows="2" placeholder="What do you think?"></textarea>
            <button class="button" type="submit">Send</button>
        </div>
    </form>
    @else
    @include('layout.small-components.login-required',["message"=>"Login to join discussion"])
    @endif
   </div>
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
