<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
    <ul>
        @auth
            <li><span class="fa fa-user"></span><span> {{auth()->user()->name}}</span></li>
            <li><a href="{{route('logout')}}"><span>Logout</span></a></li>
        @endauth
        @guest
        <li><a href="{{route('register')}}"><span>Register</span></a></li>
        <li><a href="{{route('login')}}"><span>Login</span></a></li>
        @endguest
    </ul>
</div>
