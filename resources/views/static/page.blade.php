@extends('layout.main')
@section('content')
    <h1>{{$viewModel->getTitle()}}</h1>
    <p>{{$viewModel->getTagline()}}</p>
    <p>
       @include($viewModel->getContentView())
    </p>
@endsection
