@extends('layout.main')
@section('content')
    <div class="row">
        <div class="columns small-12 medium-8 medium-push-2">
            <h1>{{$viewModel->getTitle()}}</h1>
            <hr>
            @include('layout.errors')
            <form action="{{route('password.request')}}" method="POST">
                @csrf
               <div class="row">
                   <div class="columns">
                    <div class="callout">
                        Enter your email address and we will send you the password reset link.
                    </div>
                    <div class="input-group">
                        <label for="">Email address</label>
                        <input type="email" name="email">
                    </div>
                    <div class="input-group">
                        <button class="button">Reset</button>
                    </div>
                   </div>
               </div>
            </form>
        </div>
    </div>
@endsection
