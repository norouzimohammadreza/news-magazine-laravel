<x-admin.layout.master>

    <x-slot name="title">Banners Management</x-slot>

    <x-admin.dashboard-title>
        <x-slot name="title"> Banners</x-slot>
        <x-slot name="goto">{{route('banner.create')}}</x-slot>
        <x-slot name="create">create</x-slot>
    </x-admin.dashboard-title>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of banners</caption>
            <thead>
            <tr>
                <th>#</th>
                <th>url</th>
                <th>image</th>
                <th>setting</th>
            </tr>
            </thead>

            <x-admin.banner.show-tables :banners="$banners"/>

        </table>
    </div>

</x-admin.layout.master>
