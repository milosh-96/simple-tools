<div class="title-bar" id="toggleMenu" data-responsive-toggle="nav-menu" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle></button>
  <div class="title-bar-title">Menu</div>
</div>

<div id="nav-menu">
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
<div class="title-bar" id="closeMenu" data-responsive-toggle="nav-menu" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle></button>
    <div class="title-bar-title">Close</div>
  </div>
</div>
