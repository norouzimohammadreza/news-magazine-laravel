<x-auth.master>

    <x-slot name="title">New Password</x-slot>

    <form method="post" action="{{url('confirm-password/'.$token)}}" class="login100-form validate-form">\

        @csrf

        <span class="login100-form-title">
        Reset Password
    </span>

        <x-auth.show-errors/>

        <x-auth.password/>

        <x-auth.password-confirmation/>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Send
            </button>
        </div>

        <div class="text-center p-t-12">
        <span class="txt1">
            Forgot
        </span>

            <a class="txt2" href="{{route('resetPassword')}}">
                Username / Password?
            </a>

        </div>

        <div class="text-center p-t-136">
            <a class="txt2" href="{{route('login')}}">
                Login your Account
            </a>
        </div>

    </form>

</x-auth.master>
