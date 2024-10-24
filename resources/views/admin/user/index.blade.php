<x-admin.layout.master>

    <x-slot name="title">{{__('user.users_management')}}</x-slot>

    <x-admin.dashboard-title>
        <x-slot name="title">{{__('user.users_management')}}</x-slot>
        <x-slot name="goto">{{ route('user.create')}} </x-slot>
        <x-slot name="create">{{__('dashboard.create')}}</x-slot>
    </x-admin.dashboard-title>

    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>{{__('user.list_of_users')}}</caption>

            <x-admin.user.thead-users-table/>

            <x-admin.user.show-users :users="$users"/>

        </table>
        {{$users->links()}}
    </section>

</x-admin.layout.master>
