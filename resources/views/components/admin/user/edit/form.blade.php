<section class="row my-3">
    <section class="col-12">
        <form method="post" action="{{route('user.update',[$user])}}" >
            @csrf
            @method('PUT')
            <x-admin.user.edit.name-input :user="$user"/>
            <x-admin.user.edit.permission-input :user="$user"/>
            <x-admin.user.edit.submit-button/>
        </form>

    </section>
</section>
