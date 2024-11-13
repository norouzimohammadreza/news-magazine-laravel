<x-admin.layout.admin>

    <x-slot name="title">{{__('user.edit')}}</x-slot>

    <x-admin.modify-title :name="__('user.edit')" />

    <x-admin.user.edit.form :user="$user"/>

</x-admin.layout.admin>
