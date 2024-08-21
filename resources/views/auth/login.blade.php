<x-auth.master>
    <x-slot name="title">Login</x-slot>


    <form method="post" action="" class="login100-form validate-form">
    <span class="login100-form-title">
        Member Login
    </span>
            <x-auth.show-errors/>
       <x-auth.email/>
        <x-auth.password/>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Login
            </button>
        </div>

        <x-auth.forgot-password/>

        <div class="text-center p-t-136">
            <a class="txt2" href="{{route('register')}}">
                Create your Account
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
    </div>
    </form>
</x-auth.master>
