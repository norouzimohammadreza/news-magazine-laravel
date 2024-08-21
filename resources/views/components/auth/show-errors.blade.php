@if($errors->all())
    <div class="mb-2 alert alert-danger">
        <small class="form-text text-danger">@error('name') {{ $message }} @enderror</small>
        <small class="form-text text-danger">@error('email') {{ $message }} @enderror</small>
        <small class="form-text text-danger">@error('password') {{ $message }} @enderror</small>
    </div>
@endif
