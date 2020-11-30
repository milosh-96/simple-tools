@extends('layout.main')
@section('content')
    <div class="row">
        <div class="columns small-12 medium-8 medium-push-2">
            <h1>{{$viewModel->getTitle()}}</h1>
            <hr>
            @include('layout.errors')
            <form action="{{route('user-password.update')}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="input-group">
                    <label for="">Current Password</label>
                    <input type="password" name="current_password">
                </div>
                <div class="input-group">
                    <label for="">New Password</label>
                    <input type="password" name="password" autocomplete="password">
                </div>
                <div class="input-group">
                    <label for="">New Password Confirmation</label>
                    <input type="password" name="password_confirmation" autocomplete="password_confirmation">
                </div>
                <div class="input-group">
                    <button class="button">Change</button>
                </div>
            </form>
        </div>
    </div>
@endsection
