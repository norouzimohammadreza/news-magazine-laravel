<x-admin.layout.master>
    <x-slot name="title">Edit Category</x-slot>
    <x-admin.modify-title :name="'Edit Category'" />
<x-admin.category.edit.form :category="$category"/>
</x-admin.layout.master>
