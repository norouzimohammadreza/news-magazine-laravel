<section class="row my-3">
    <section class="col-12">
        <form method="post" action="{{route('user.store')}}" >
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name ...">
                <p class="text-danger">@error('name'){{$message}}  @enderror</p>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email ...">
                <p class="text-danger">@error('email'){{$message}}  @enderror</p>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Enter Your Password ...">
                <p class="text-danger">@error('password'){{$message}}  @enderror</p>
            </div>
            <div class="form-group">
                <label for="is_admin">permission</label>
                <select name="is_admin" id="is_admin" class="form-control" autofocus>
                    <option value="{{0}}">User</option>
                    <option value="{{1}}">Admin</option>
                </select>
                <p class="text-danger">@error('is_admin'){{$message}}  @enderror</p>
            </div>
            <x-admin.ui.submit-button>
                <x-slot name="button">Store</x-slot>
            </x-admin.ui.submit-button>

        </form>

    </section>
</section>
