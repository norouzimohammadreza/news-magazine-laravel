<x-admin.layout.master>

    <x-slot name="title">{{__('category.Categories_management')}}</x-slot>

    <x-admin.dashboard-title>
        <x-slot name="title">{{__('category.category')}}</x-slot>
        <x-slot name="goto">{{route('category.create')}}</x-slot>
        <x-slot name="create">{{__('dashboard.create')}}</x-slot>
    </x-admin.dashboard-title>

    <x-admin.category.show-categories :categories="$categories"/>

</x-admin.layout.master>
