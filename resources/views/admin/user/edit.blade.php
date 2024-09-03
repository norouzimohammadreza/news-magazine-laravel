<x-admin.layout.master>
    <x-slot name="title">Edit User</x-slot>
    <x-admin.modify-title :name="'Edit User'" />
    <x-admin.user.edit.form :user="$user"/>

</x-admin.layout.master>
