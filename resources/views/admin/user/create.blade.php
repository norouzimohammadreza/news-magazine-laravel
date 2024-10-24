<x-admin.layout.master>

    <x-slot name="title">{{__('user.create')}}</x-slot>

    <x-admin.modify-title :name="__('user.create')"/>

    <x-admin.user.create.form/>

</x-admin.layout.master>
