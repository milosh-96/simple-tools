<!DOCTYPE html>
<html lang="en">

<head>
    @if($viewModel->isProduction())
    <script async src="https://www.googletagmanager.com/gtag/js?id={{config('app.google_tag_id')}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', "{{config('app.google_tag_id')}}");
    </script>
    <script data-ad-client="ca-pub-{{config('app.google_adsense_pub_id')}}" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    @endif
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{$viewModel->getDescription() ?? $viewModel->getTagline() ?? ""}}" />
    <title>{{$title ?? $viewModel->getTitle() ?? view()->getSections()['title'] ?? "Home page"}} - {{env('APP_NAME')}} - Do simple things SIMPLY</title>
    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.3/css/foundation-float.min.css" integrity="sha512-tuBWy51BW5GZ5BfYddst4eq3d8mcnOk1I5ZHj45P5AUcf9yo5X3KmOJslloaM0ZoSDzS4lcGY91j3L1k5ZVuVg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/app.css" crossorigin="anonymous">
    @if(request()->route()->getName())
    <link href="{{url()->current()}}" rel="canonical" />
    @endif
    <!-- Global site tag (gtag.js) - Google Analytics -->
    @yield('additionalHead')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "{{$viewModel->getTitle()}}",
            "description": "{{$viewModel->getDescription()}}",
            "publisher": "{{env('APP_NAME')}}"
        }
    </script>
    @yield('json-ld')
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
        <div class="columns small-12 medium-3 nav-menu-wrapper">
            @include('layout.sidenav')
        </div>
        <div class="columns small-12 medium-9" id="page">
            @include('layout.notifications')
            @yield('content')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.3/js/foundation.min.js" integrity="sha512-9cXmvmK1gIDw3Tol6Xg/1SUls/CvBMgedu1aDjT519sQzy7jk+LoezyQqlzClW2LgXww4xEyuqtofg7PtWteLQ==" crossorigin="anonymous"></script>

    @yield('layoutScriptSection')
    @yield('scriptSection')
</body>

</html>
