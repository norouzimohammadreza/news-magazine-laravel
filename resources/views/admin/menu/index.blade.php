<x-admin.layout.master>
    <x-slot name="title">Menus</x-slot>
    <x-admin.dashboard-title>
        <x-slot name="title">Menus</x-slot>
        <x-slot name="goto">{{route('menu.create')}}</x-slot>
        <x-slot name="create">create</x-slot>
    </x-admin.dashboard-title>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of menus</caption>

<x-admin.menu.thead-menus-table/>
            <x-admin.menu.tbody-menus-table :menus="$menus"/>
        </table>
    </section>


</x-admin.layout.master>
