@extends('layout.main')
@section('content')
    <div class="row">
        <div class="columns small-12 medium-8 medium-push-2">
            <h1>{{$viewModel->getTitle()}}</h1>
            <p>{{$viewModel->getTagline()}}</p>
            <hr>
            @include('layout.errors')
            <form action="{{route('user-profile-information.update')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="columns small-12">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="input-group" title="You cannot edit your user name.">
                            <label for="">User Name<p>
                                <small class="show-for-small-only">You cannot edit your user name.</small>
                            </label>
                            <input type="text" value="{{auth()->user()->user_name}}" name="user_name" placeholder="Your User Name" disabled>
                        </div>
                        <div class="input-group">
                            <label for="">Name</label>
                            <input type="text" name="name" placeholder="Your name" value="{{auth()->user()->name}}">
                        </div>
                        <div class="input-group">
                            <label for="">Email<p>
                                <small>If you change your email address, you will have to verify the new email address.</small>

                            </label>
                            <input type="email" name="email" placeholder="Your email" value="{{auth()->user()->email}}">
                        </div>

                        <div class="input-group">
                            <button class="button" type="submit">Submit</button>
                        </div>
                    </div>
                    <hr>
                </div>
            </form>
            <div class="callout">
                To change password go to <a href="{{route('profile.edit-password')}}">Edit password</a> page.
            </div>
        </div>
    </div>
@endsection
