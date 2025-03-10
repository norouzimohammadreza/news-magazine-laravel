<x-layouts.master>

    <x-slot name="title">{{__('auth_page.forgot_password')}}</x-slot>
    <x-change-language-button/>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('/auth/assets/images/img-01.png')}}" alt="IMG">
                </div>
                <form method="post" action="{{url('confirm-password/'.$token)}}" class="login100-form validate-form">

                    @csrf

                    <span class="login100-form-title">
                        {{__('auth_page.reset_password')}}
                    </span>

                    <x-auth.show-errors/>

                    <x-auth.password/>

                    <x-auth.password-confirmation/>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            {{__('auth_page.send')}}
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            {{__('auth_page.forget')}}
                        </span>

                        <a class="txt2" href="{{route('resetPassword')}}">
                            {{__('auth_page.username_password')}}
                        </a>

                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{route('login')}}">
                            {{__('auth_page.login_your_account')}}
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <x-layouts.js/>
    <x-layouts.css/>
</x-layouts.master>
