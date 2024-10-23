<x-auth.master>

    <x-slot name="title">{{__('auth_page.reset_password')}}</x-slot>

    <form method="post" action="{{route('forgotPassword')}}" class="login100-form validate-form">

        @csrf

        <span class="login100-form-title">
        {{__('auth_page.forgot_password')}}
        </span>

        <x-auth.show-errors/>

        <x-auth.email/>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                {{__('auth_page.send')}}
            </button>
        </div>

        <div class="text-center p-t-136">
            <a class="txt2" href="<?= url('register'); ?>">
                {{__('auth_page.create_your_account')}}
            </a>
        </div>

    </form>

</x-auth.master>
