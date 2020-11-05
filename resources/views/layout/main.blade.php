<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? $viewModel->getTitle() ?? "Home page"}} - Simple Tools - Do simple things SIMPLY</title>
    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation-float.min.css"  crossorigin="anonymous">
    <style>
        a {
            color:inherit;
        }
    </style>
</head>
<body>
        <header style="background: #f2f2f2;margin-bottom:50px;">
           <div class="row">
            <div style="font-size: 24px;">
                <a href="/" style="">
                    <p style="display: inline-block">
                        simple<strong>tools<span style="color:blue">:</span></strong>
                    </p>
                </a>
                <a href="#">do simple - simply!</a>
            </div>
           </div>
        </header>
    <div class="row">
        <div class="columns small-12 medium-3" style="background:rgb(240,240,250)">
           @include('layout.sidenav')
        </div>
        <div class="columns small-12 medium-8">
            <div class="row">
                <div class="callout">
                    @yield('content')

                </div>
            </div>
        </div>
    </div>
        <footer style="margin-top:300px;background:#f2f2f2">
            <div class="row">
                <div style="padding: 10px 0">
                    &copy; {{date("Y")}}. Simple Tools. Developed by Miloš Jovanović - Simple Tools.
                </div>
            </div>
        </footer>
    @yield('scriptSection')
</body>
</html>
