@extends('layout.main')
@section('content')
    <h1>{{$viewModel->getTitle()}}</h1>
    <p>{{$viewModel->getTagline()}}</p>
    @include('layout.errors')
    <hr>
    {{-- <table class="table">
        <thead>
            <tr>
                <th>Currency</th>
                <th>Buy</th>
                <th>Sell</th>
            </tr>
        </thead>
        <tbody>
            @foreach($viewModel->getData() as $key=>$value)
            <tr>
                <td>{{$value->symbol}} | {{$key}}</td>
                <td>{{$value->buy}}</td>
                <td>{{$value->sell}}</td>
            </tr>
            @endforeach
        </tbody>
    </table> --}}

    <div id="bitcoin-chart-table">
        Loading...please wait.
    </div>
    @include('layout.notes')
@endsection

@section('json-ld')
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Table",
      "about": "{{$viewModel->getTitle()}}"
    }
    </script>
@endsection


@section('scriptSection')
    <script src="/js/components/BitcoinChartTable.js" type="text/babel"></script>
    <script type="text/babel">
        'use strict';

const e = React.createElement;

const domContainer = document.querySelector('#bitcoin-chart-table');
ReactDOM.render(e(BitcoinChartTable), domContainer);
    </script>
@endsection
