<x-admin.layout.master>
    <x-slot name="title">Categories Management</x-slot>
    <x-admin.dashboard-title>
        <x-slot name="title">Category</x-slot>
        <x-slot name="goto">{{route('category.create')}}</x-slot>
        <x-slot name="create">create</x-slot>
    </x-admin.dashboard-title>
    <x-admin.category.show-categories :categories="$categories"/>

</x-admin.layout.master>
