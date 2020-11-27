@extends('layout.main')
@section('content')
    <div class="row">
        <div class="columns small-12 medium-8 medium-push-2">
            <h1>{{$viewModel->getTitle()}}</h1>
            <hr>
            @include('layout.errors')
            <form action="{{route('password.update')}}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{request()->route('token')}}">
                <div class="input-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{request()->get('email') ?? ''}}">
                </div>
                <div class="input-group">
                    <label for="">New Password</label>
                    <input type="password" name="password">
                </div>
                <div class="input-group">
                    <label for="">New Password Confirmation</label>
                    <input type="password" name="password_confirmation">
                </div>
                <div class="input-group">
                    <button class="button">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
