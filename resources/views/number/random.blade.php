@extends('layout.main')
@section('content')
    <h1>{{$viewModel->getTitle()}}</h1>
    <p>{{$viewModel->getTagline()}}</p>
    @include('layout.errors')
   {{-- <div>
    <hr>
    <form method="POST" action="{{route('number.random')}}">
        @csrf
        <input type="hidden" name="submitted" value="1">
        <div class="row">
            <div class="columns small-12 medium-6">
                <div class="input-group">
                    <label for="">Min</label>
                    <input type="number" name="min" id="min" value="{{$viewModel->min}}">
                </div>
            </div>
            <div class="columns small-12 medium-6">
                <div class="input-group">
                    <label for="">Max</label>
                    <input type="number" name="max" id="max" value="{{$viewModel->max}}">
                </div>
            </div>
        </div>
        <button class="button" type="submit">Get</button>


    </form>
    @if($viewModel->formSubmitted)
    <hr>
    <textarea disabled style="font-size: 36px;padding:25px;height:150px;">{{$viewModel->randomNumber}}</textarea>
    @endif
   </div> --}}

   <div id="random-number"></div>
@endsection

@section('scriptSection')
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>

<script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
  <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
<script type="text/babel"  src="/js/components/RandomNumber.js"></script>
<script type="text/babel">
    'use strict';

const e = React.createElement;

const domContainer = document.querySelector('#random-number');
ReactDOM.render(e(RandomNumber), domContainer);
    </script>
@endsection
