<div>
    <small>{{$comment->created_at->diffForHumans()}}|{{$comment->user->user_name}}</small>
    <hr>
    {{$comment->body}}
</div>
