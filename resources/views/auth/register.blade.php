<x-auth.master>

    <x-slot name="title">{{__('auth_page.register')}}</x-slot>

    <form method="post" action="{{route('register.store')}}" class="login100-form validate-form">

        @csrf

        <span class="login100-form-title">
        {{__('auth_page.member_register')}}
    </span>

        <x-auth.show-errors/>

        <x-auth.name/>

        <x-auth.email/>

        <x-auth.password/>

        <x-auth.password-confirmation/>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                {{__('auth_page.register')}}
            </button>
        </div>

        <x-auth.forgot-password/>

        <div class="text-center p-t-136">
            <a class="txt2" href="{{route('login')}}">
                {{__('auth_page.login_your_account')}}
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
        </div>

    </form>

</x-auth.master>
