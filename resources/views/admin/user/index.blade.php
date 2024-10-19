<x-admin.layout.master>

    <x-slot name="title">Users Management</x-slot>

    <x-admin.dashboard-title>
        <x-slot name="title">Users</x-slot>
        <x-slot name="goto">{{ route('user.create')}} </x-slot>
        <x-slot name="create">create</x-slot>
    </x-admin.dashboard-title>

    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of users</caption>

            <x-admin.user.thead-users-table/>

            <x-admin.user.show-users :users="$users"/>

        </table>
        {{$users->links()}}
    </section>

</x-admin.layout.master>
