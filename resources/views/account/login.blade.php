@extends('layout.main')
@section('content')
    <div class="row">
        <div class="columns small-12 medium-8 medium-push-2">
            <h1>{{$viewModel->getTitle()}}</h1>
            <p>{{$viewModel->getTagline()}}</p>
            <hr>
            @include('layout.errors')
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="columns small-12">
                        <div class="input-group">
                            <label for="">Email</label>
                            <input type="text" name="email" placeholder="Your email address">
                        </div>
                        <div class="input-group">
                            <label for="">Password</label>
                            <input type="password" name="password" placeholder="Your password">
                        </div>
                        <div class="input-group">
                            <button class="button" type="submit">Login</button>
                        </div>
                    </div>
                    <hr>
                    <a href="{{route('password.request')}}">Forgot password?</a> |
                    <a href="{{route('register')}}">Register a new account</a>
                </div>
            </form>
        </div>
    </div>
@endsection
