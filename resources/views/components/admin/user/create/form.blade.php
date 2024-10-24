<section class="row my-3">
    <section class="col-12">
        <form method="post" action="{{route('user.store')}}" >
            @csrf
            <div class="form-group">
                <label for="name">{{__('validation.attributes.name')}}</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="{{__('user.enter_name')}} ...">
                <p class="text-danger">@error('name'){{$message}}  @enderror</p>
            </div>
            <div class="form-group">
                <label for="email">{{__('validation.attributes.email')}}</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="{{__('user.enter_email')}} ...">
                <p class="text-danger">@error('email'){{$message}}  @enderror</p>
            </div>
            <div class="form-group">
                <label for="password">{{__('validation.attributes.password')}}</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="{{__('user.enter_password')}} ...">
                <p class="text-danger">@error('password'){{$message}}  @enderror</p>
            </div>
            <div class="form-group">
                <label for="is_admin">{{__('user.permission')}}</label>
                <select name="is_admin" id="is_admin" class="form-control" autofocus>
                    <option value="{{0}}">{{__('user.user')}}</option>
                    <option value="{{1}}">{{__('user.admin')}}</option>
                </select>
                <p class="text-danger">@error('is_admin'){{$message}}  @enderror</p>
            </div>
            <x-admin.ui.submit-button>
                <x-slot name="button">{{__('dashboard.store')}}</x-slot>
            </x-admin.ui.submit-button>

        </form>

    </section>
</section>
