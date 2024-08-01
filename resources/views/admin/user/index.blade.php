<x-admin.layout.master>
    <x-slot name="title">Users Management</x-slot>
    <x-admin.user.title/>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of users</caption>
            <x-admin.user.thead-users-table/>
            <x-admin.user.show-users :users="$users"/>
        </table>
    </section>

</x-admin.layout.master>
