@extends('layout.main')
@section('content')
    <h1>{{$viewModel->getTitle()}}</h1>
    <p>{{$viewModel->getTagline()}}</p>
    <p>
        {!!$viewModel->getContent()!!}
    </p>
@endsection
