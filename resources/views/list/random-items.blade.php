@extends('layout.main')
@section('content')

    <h2>Get Random Item from List</h2>
    <hr>
   <form action="{{route('list.random')}}" method="POST">
    <div class="row">
        <div class="small-12 medium-12 columns">
            @csrf
            <input type="hidden" name="submitted" value="1">
            <div class="cell">
                <em>Type as many items as you want. Don't forget to seperate them by comma (,).</em>
               <textarea name="items" rows="3" style="width:100%;resize: none" placeholder="Separate Item by comma (,)">{{request()->items}}</textarea>
            </div>
            <button class="button" type="submit">Get Random</button>
        </div>
    </div>
   </form>
    @if(request()->submitted)
        <hr>
        <h3>Result</h3>
        @if($viewModel->parsedItems)
            <ul class="list">
                @foreach($viewModel->parsedItems as $key=>$value)
            <li>
                @if($key == $viewModel->randomItemIndex)
                <strong>{{$value}}</strong>
                @else
                {{$value}}
                @endif
            </li>
            @endforeach
            </ul>
        @endif
    @endif
@endsection
