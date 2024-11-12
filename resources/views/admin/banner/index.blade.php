<x-admin.layout.master>
    <x-slot name="title">{{__('banner.banners_management')}}</x-slot>

    <x-admin.dashboard-title>
        <x-slot name="title"> {{__('banner.banners_management')}}</x-slot>
        <x-slot name="goto">{{route('banner.create')}}</x-slot>
        <x-slot name="create">{{__('dashboard.create')}}</x-slot>
    </x-admin.dashboard-title>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>{{__('banner.list_of_banners')}}</caption>
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('validation.attributes.url')}}</th>
                <th>{{__('validation.attributes.image')}}</th>
                <th>{{__('dashboard.setting')}}</th>
            </tr>
            </thead>

            <x-admin.banner.show-tables :banners="$banners"/>

        </table>
        {{$banners->links()}}
    </div>
</x-admin.layout.master>
-
