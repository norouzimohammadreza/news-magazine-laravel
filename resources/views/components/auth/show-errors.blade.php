@if($errors->all() || session()->has('error'))
    <div class="mb-2 alert alert-danger">
        <small class="form-text text-danger">@error('name') {{ $message }} @enderror</small>
        <small class="form-text text-danger">@error('email') {{ $message }} @enderror</small>
        <small class="form-text text-danger">@error('password') {{ $message }} @enderror</small>
        <small class="form-text text-danger">{{session('error')}}</small>
    </div>
@endif
@if( session()->has('verifyMessage'))
    <div class="mb-2 alert alert-success">
        <small class="form-text text-success">{{session('verifyMessage')}}</small>
    </div>
@endif
