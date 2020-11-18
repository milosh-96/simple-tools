@extends('layout.main')
@section('content')
    <h1>{{$viewModel->getTitle()}}</h1>
    <p>{{$viewModel->getTagline()}}</p>
    @include('layout.errors')
    <hr>
    <table class="table">
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
    </table>
    @include('layout.notes')
@endsection
