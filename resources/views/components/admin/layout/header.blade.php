<nav class="navbar navbar-light bg-gradiant-green-blue nav-shadow">

    <span class="p-1 rounded rounded-2 bg-secondary">
    <x-change-language-button/>
    </span>
    <span class="dropdown">
        <a class="dropdown-toggle text-decoration-none text-dark" href="#" id="navbarDropdown" role="button"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('logout')}}">{{__('main.logout')}}</a>

        </div>
    </span>

</nav>
