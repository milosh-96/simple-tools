@extends('layout.main')
@section('content')
@include('layout.errors')

<!-- <h3>Tips</h3>-->

    <h1>Welcome!</h1>
    <p>Simple Tools is a place where you can do various simple things quickly.</p>

    <p>Do you want to quickly resize an image, get a random number, make a choice or something else?</p>
    <hr>
    <div id="component">

    </div>

@endsection


@section('scriptSection')
<script type="text/babel"  src="/js/components/RandomNumber.js"></script>
<script type="text/babel">
    'use strict';

const e = React.createElement;

const domContainer = document.querySelector('#component');
ReactDOM.render(e(RandomNumber), domContainer);
    </script>
@endsection

@section('additionalHead')
@endsection
