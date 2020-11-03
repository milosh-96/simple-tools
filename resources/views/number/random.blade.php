@extends('layout.main')
@section('content')
    <h2>Random Number</h2>

    <form method="POST" action="{{route('number.random')}}">
        @csrf
        <input type="hidden" name="submitted" value="true">
        <div class="row">
            <div class="columns small-12 medium-6">
                <div class="input-group">
                    <label for="">Min</label>
                    <input type="number" name="min" id="min" value="{{$min}}">
                </div>
            </div>
            <div class="columns small-12 medium-6">
                <div class="input-group">
                    <label for="">Max</label>
                    <input type="number" name="max" id="max" value="{{$max}}">
                </div>
            </div>
        </div>
        <button class="button" type="submit">Get</button>


    </form>
    @if(request()->submitted)
    <hr>
    <textarea disabled style="font-size: 36px;padding:25px;height:150px;">{{$number}}</textarea>
    @endif
@endsection
