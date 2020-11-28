@extends('layout.main')
@section('content')
@include('layout.errors')
    <h1>Welcome!</h1>
    <p>Simple Tools is a place where you can do various simple things quickly.</p>

    <p>Do you want to quickly resize an image, get a random number, make a choice or something else?</p>
    <hr>

   <!-- <h3>Tips</h3>-->
@endsection

@section('additionalHead')
<link href="{{route('home')}}" rel="canonical" />
@endsection
