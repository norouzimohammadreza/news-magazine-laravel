<x-admin.layout.master>

    <x-slot name="title">{{__('menu.menus_management')}}</x-slot>

    <x-admin.dashboard-title>
        <x-slot name="title">{{__('menu.menus_management')}}</x-slot>
        <x-slot name="goto">{{route('menu.create')}}</x-slot>
        <x-slot name="create">{{__('dashboard.create')}}</x-slot>
    </x-admin.dashboard-title>

    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>{{__('menu.list_of_menus')}}</caption>

            <x-admin.menu.thead-menus-table/>

            <x-admin.menu.tbody-menus-table :menus="$menus"/>

        </table>
        {{$menus->links()}}
    </section>


</x-admin.layout.master>
