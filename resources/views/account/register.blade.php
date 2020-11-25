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
                            <label for="">User Name</label>
                            <input type="text" name="text" placeholder="Your User Name">
                        </div>
                        <div class="input-group">
                            <label for="">Email Address</label>
                            <input type="text" name="text" placeholder="Your Email Address">
                        </div>
                        <div class="input-group">
                            <label for="">Password</label>
                            <input type="text" name="text" placeholder="Your Password">
                        </div>
                        <div class="input-group">
                            <label for="">Confirm Password</label>
                            <input type="text" name="text" placeholder="Confirm password by typing it again.">
                        </div>

                        <div class="input-group">
                            <button class="button">Register</button>
                        </div>
                    </div>
                    <hr>
                    <a href="{{route('login')}}">Already have account?</a>
                </div>
            </form>
        </div>
    </div>
@endsection
