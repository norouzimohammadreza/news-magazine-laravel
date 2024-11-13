<x-admin.layout.admin>

    <x-slot name="title">{{__('category.edit')}}</x-slot>

    <x-admin.modify-title :name="__('category.edit')"/>

    <x-admin.category.edit.form :category="$category"/>

</x-admin.layout.admin>
