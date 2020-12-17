@extends('layout.main')
@section('content')

    <h1>{{$viewModel->getTitle()}}</h1>
    <p>{{$viewModel->getTagline()}}</p>
    @include('layout.errors')
    <hr>

    <div id="component">
        loading...
    </div>



@endsection

@section('scriptSection')
<script type="text/babel"  src="/js/components/RandomItemFromList.js"></script>
<script type="text/babel">
    'use strict';

const e = React.createElement;
let props = {id: {{(request()->route('itemList'))->id ?? 0}} };
const domContainer = document.querySelector('#component');
ReactDOM.render(e(RandomItemFromList,props), domContainer);
    </script>
@endsection
