<h3>List of tools</h3>
<ul class="vertical menu">
    @foreach($navMenuItems as $section)
    <li class="{{$section['class'] ?? ''}}">
        <strong>{{$section["title"]}}</strong>
        <ul class="nested vertical menu">
            @foreach($section["items"] as $item)
            <li>
                <a href="{{$item->url}}">{{$item->title}}</a>
            </li>
            @endforeach
        </ul>
    </li>
    @endforeach

</ul>
