<x-auth.master>
    <x-slot name="title">Reset Password</x-slot>
    <form method="post" action="{{route('forgotPassword')}}" class="login100-form validate-form">
        @csrf
    <span class="login100-form-title">
        Forgot Password
    </span>
    <x-auth.show-errors/>
   <x-auth.email/>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Send
            </button>
        </div>

        <div class="text-center p-t-136">
            <a class="txt2" href="<?= url('register'); ?>">
                Create your Account
            </a>
        </div>
    </form>
</x-auth.master>
