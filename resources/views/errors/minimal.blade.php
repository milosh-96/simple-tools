<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.3/css/foundation-float.min.css" integrity="sha512-tuBWy51BW5GZ5BfYddst4eq3d8mcnOk1I5ZHj45P5AUcf9yo5X3KmOJslloaM0ZoSDzS4lcGY91j3L1k5ZVuVg==" crossorigin="anonymous" />
         <link rel="stylesheet" href="/css/app.css" crossorigin="anonymous">
         <style>
             #page {margin-bottom: 250px;margin-top:60px;}
         </style>
    </head>
    <body>
        <header>
            <div class="row">
                <div class="columns small-12 medium-3">
                    <a href="{{route('home')}}" id="top-logo">Home page</a>
                </div>
                @if(auth()->user())
                <div class="columns small-12 medium-4 medium-text-right">
                    @include('layout.user-menu')
                </div>
                @endif
            </div>
        </header>
        <div class="row">

            <div class="columns small-12 medium-12" id="page">
                @include('layout.notifications')
                <div class="text-center">
                    <h1><strong>@yield('code')</strong>
                        @yield('message')</h1>
                        <hr>
                        <a href="{{ app('router')->has('home') ? route('home') : url('/') }}">
                            <button class="button">
                                {{ __('Return to Index') }}
                            </button>
                        </a>
                </div>
            </div>
        </div>
        <footer>
            <div class="row">
                <div class="columns">
                    <small>&copy; {{date("Y")}}. {{env('APP_NAME')}}. All Rights Reserved.</small>
                    <small><a href="{{route('tos')}}">Terms of Service</a></small>
                </div>
            </div>
        </footer>
    </body>
</html>
