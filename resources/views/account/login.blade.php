@extends('layout.main')
@section('content')
    <div class="row">
        <div class="columns small-12 medium-8 medium-push-2">
            <h1>{{$viewModel->getTitle()}}</h1>
            <p>{{$viewModel->getTagline()}}</p>
            <hr>
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
                            <input type="text" name="email" placeholder="Your password">
                        </div>
                        <div class="input-group">
                            <button class="button">Login</button>
                        </div>
                    </div>
                    <hr>
                    <a href="#">Forgot password?</a>
                </div>
            </form>
        </div>
    </div>
@endsection
