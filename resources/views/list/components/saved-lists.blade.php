<div class="saved-lists">
    @if(count($user->itemLists) > 0)
        <strong>Your Saved Lists:</strong>
@foreach($user->itemLists as $list)
<a href="{{route('list.random',['itemList'=>$list->id])}}">{{$list->name}}</a>
@endforeach
@else
<em>You don't have any saved lists.</em>
@endif
</div>
