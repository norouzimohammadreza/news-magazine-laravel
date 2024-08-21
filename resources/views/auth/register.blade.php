<x-auth.master>
    <x-slot name="title">Register</x-slot>
    <form method="post" action="{{route('register.store')}}" class="login100-form validate-form">
        @csrf
    <span class="login100-form-title">
        Register
    </span>
        @if($errors->all())
        <div class="mb-2 alert alert-danger">
            <small class="form-text text-danger">@error('name') {{ $message }} @enderror</small>
            <small class="form-text text-danger">@error('email') {{ $message }} @enderror</small>
            <small class="form-text text-danger">@error('password') {{ $message }} @enderror</small>
        </div>
        @endif
        <div class="wrap-input100">
            <input class="input100" type="text" name="name" placeholder="Username">
            <span class="symbol-input100">
            <i class="fa fa-user" aria-hidden="true"></i>
        </span>
        </div>

        <div class="wrap-input100" >
            <input class="input100" type="text" name="email" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
        </span>
        </div>

        <div class="wrap-input100">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
        </div>
        <div class="wrap-input100">
            <input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
        </div>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Register
            </button>
        </div>

        <div class="text-center p-t-12">
        <span class="txt1">
            Forgot
        </span>
            <a class="txt2" href="">
                Username / Password?
            </a>
        </div>

        <div class="text-center p-t-136">
            <a class="txt2" href="">
                Login your Account

                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
        </div>
    </form>
</x-auth.master>
