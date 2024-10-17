<x-auth.master>

    <x-slot name="title">Register</x-slot>

    <form method="post" action="{{route('register.store')}}" class="login100-form validate-form">

        @csrf

        <span class="login100-form-title">
        Register
    </span>

        <x-auth.show-errors/>

        <x-auth.name/>

        <x-auth.email/>

        <x-auth.password/>

        <x-auth.password-confirmation/>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Register
            </button>
        </div>

        <x-auth.forgot-password/>

        <div class="text-center p-t-136">
            <a class="txt2" href="{{route('login')}}">
                Login your Account
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
        </div>

    </form>

</x-auth.master>
