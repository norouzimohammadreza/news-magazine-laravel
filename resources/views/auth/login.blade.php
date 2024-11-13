<x-layouts.master>
    <x-slot name="title">{{__('auth_page.login')}}</x-slot>
    <x-change-language-button/>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('/auth/assets/images/img-01.png')}}" alt="IMG">
                </div>


                <form method="post" action="{{route('login.store')}}" class="login100-form validate-form">

                    @csrf

                    <span class="login100-form-title">
        {{__('auth_page.member_login')}}
        </span>

                    <x-auth.show-errors/>

                    <x-auth.email/>

                    <x-auth.password/>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            {{__('auth_page.login')}}
                        </button>
                    </div>

                    <x-auth.forgot-password/>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{route('register')}}">
                            {{__('auth_page.create_your_account')}}
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <x-layouts.css/>
    <x-layouts.js/>

</x-layouts.master>
