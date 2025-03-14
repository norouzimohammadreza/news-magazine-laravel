@props([
'user'
])
<section class="row my-3">
    <section class="col-12">
        <form method="post" action="{{route('user.update',[$user])}}" >
            @csrf
            @method('PATCH')
            <x-admin.user.edit.name-input :user="$user"/>
            <x-admin.user.edit.permission-input :user="$user"/>
            <x-admin.ui.submit-button>
                <x-slot name="button">{{__('dashboard.update')}}</x-slot>
            </x-admin.ui.submit-button>
        </form>

    </section>
</section>
