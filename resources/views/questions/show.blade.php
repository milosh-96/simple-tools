@extends('layout.main')
@section('content')
   <div>
    <h1>Question Title</h1>
    <p>Question Description</p>
    <hr>
    <div>
        <small>{{date("Y-m-d H:i:s")}}</small>
        <small>By User</small>
    </div>
    <div class="buttons">
        <button>Yes</button>
        <button>No</button>
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
        "name": "What is attr_accessor in Ruby?",
        "upvoteCount": "196",
        "text": "I am having difficulty understanding Ruby attr_accessors, can someone explain them?",
        "dateCreated": "2010-11-04T20:07Z",
        "author": {
            "@type": "Person",
            "name": "someuser"
        },
        "answerCount": "4",
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
