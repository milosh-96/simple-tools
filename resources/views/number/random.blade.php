@extends('layout.main')
@section('content')
    <h2>Random Number</h2>

    <form method="POST" action="{{route('number.random')}}">
        @csrf
        <input type="hidden" name="submitted" value="true">
       <div class="input-group">
           <label for="">Min</label>
           <input type="number" name="min" id="min" value="{{$min}}">
       </div>
       <div class="input-group">
           <label for="">Max</label>
           <input type="number" name="max" id="max" value="{{$max}}">
       </div>
        <button>Get</button>


    </form>
    @if(request()->submitted)
    <h2>{{$number}}</h2>
    @endif
@endsection
