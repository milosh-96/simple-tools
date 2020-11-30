<ul class="dropdown menu medium-text-right" data-dropdown-menu id="user-menu">
    <li>
        <a href="#">{{auth()->user()->user_name}}</a>
        <ul class="menu">
            <li>
                <a href="{{route('profile.edit')}}">Edit Profile</a>
            </li>
            <li>
                <form action="{{route('logout')}}" id="logoutForm" method="POST">
                    @csrf
                    <a href="#logout">Logout</a>
                </form>
            </li>
        </ul>
    </li>
</ul>

@section('layoutScriptSection')
@parent
<script>
    $("#logoutForm").click(function() {
        $(this).submit();
    });
var userMenu = new Foundation.DropdownMenu($("#user-menu"),{
            "disableHover":true,
            "clickOpen":true,
            "dataAlignment":"right"
        });
    </script>
    @endsection
