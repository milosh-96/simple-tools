@extends('layout.main')
@section('content')

    <h2>Get Random Item from List</h2>
    <hr>
   <form action="{{route('list.random')}}" method="POST">
    <div class="row">
        <div class="small-12 medium-8 columns">
            @csrf
            <input type="hidden" name="submitted" value="1">
            <div class="input-group">
               <textarea style="resize: none;" placeholder="Separate Item by comma (,)"></textarea>
            </div>
            <button class="button" type="submit">Get Random</button>
        </div>
    </div>
   </form>
            @if(request()->submitted)
    <hr>
    <h3>Result</h3>
    @endif
@endsection
