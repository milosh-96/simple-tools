@extends('layout.main')
@section('content')
    <div class="row">
        <div class="columns small-12 medium-8 medium-push-2">
            <h1>{{$viewModel->getTitle()}}</h1>
            <hr>
            @include('layout.errors')
            <div class="callout">
                <p>{{$viewModel->getTagline()}}</p>
            </div>
        </div>
    </div>
@endsection
