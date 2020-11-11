<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{$viewModel->getDescription() ?? ""}}" />
    <meta name="keywords" content="{{$viewModel->getKeywords() ?? ""}}" />
    <title>{{$title ?? $viewModel->getTitle() ?? "Home page"}} - Simple Tools - Do simple things SIMPLY</title>
    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.3/css/foundation-float.min.css" integrity="sha512-tuBWy51BW5GZ5BfYddst4eq3d8mcnOk1I5ZHj45P5AUcf9yo5X3KmOJslloaM0ZoSDzS4lcGY91j3L1k5ZVuVg==" crossorigin="anonymous" />    <link rel="stylesheet" href="/css/app.css"  crossorigin="anonymous">
    <style>
        a {
            color:inherit;
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    @if($viewModel->isProduction())
    <script async src="https://www.googletagmanager.com/gtag/js?id={{config('app.google_tag_id')}}"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', "{{config('app.google_tag_id')}}");
    </script>
    <script data-ad-client="ca-pub-{{config('app.google_adsense_pub_id')}}" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    @endif
</head>
<body>
        <header>
           <div class="row">
                <div class="columns small-12">
                <div style="font-size: 24px;padding:10px 0">
                    <a href="/">
                        simple<strong>tools<span style="color:blue">:</span></strong>
                    </a>
                </div>
                </div>
           </div>
        </header>
    <div class="row">
        <div class="columns small-12 medium-3" style="background:rgb(240,240,250)">
           @include('layout.sidenav')
        </div>
        <div class="columns small-12 medium-8">
            <div class="row">
                <div>
                    @yield('content')

                </div>
            </div>
        </div>
    </div>
        <footer style="margin-top:30px;background:#f2f2f2">
            <div class="row">
                <div style="padding: 10px 0">
                    &copy; {{date("Y")}}. Simple Tools. All Rights Reserved.
                </div>
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.3/js/foundation.min.js" integrity="sha512-9cXmvmK1gIDw3Tol6Xg/1SUls/CvBMgedu1aDjT519sQzy7jk+LoezyQqlzClW2LgXww4xEyuqtofg7PtWteLQ==" crossorigin="anonymous"></script>
        <script>
            var menu = new Foundation.ResponsiveMenu($("#menu"));
            var elem = new Foundation.ResponsiveToggle($("#toggleMenu"));


        </script>
@yield('scriptSection')
</body>
</html>
