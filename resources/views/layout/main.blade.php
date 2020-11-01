<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? "Home page"}} - Simple Tools - Do simple things SIMPLY</title>
</head>
<body>
    <header style="display: flex">
        <h1>
            <a href="/">
                Simple Tools
            </a>
            <h1>
        <h3>Do Simple things <em>SIMPLY</em></h3>

    </header>
    <div style="width:1200px;display:flex">
        <div style="width:300px">
            <h3>List of our tools</h3>
            <p><strong>Image Tools</strong></p>
            <ul>
                <li>
                 <a href="{{route('image.resize')}}">Resize Image</a>
                </li>
            </ul>
            <p><strong>Number Tools</strong></p>
            <ul>
                <li>
                 <a href="{{route('number.random')}}">Random Number</a>
                </li>
            </ul>
        </div>
        <div style="width:800px">
            <div style="width:100%;min-height:300px;border:1px solid #ccc;padding:10">
            @yield('content')
            </div>
        </div>
    </div>
    <footer style="margin-top:300px;background:#f2f2f2;padding:10px">
        &copy; Simple Tools {{date("Y")}}. Developed by Miloš Jovanović - Simple Tools.
    </footer>
</body>
</html>
