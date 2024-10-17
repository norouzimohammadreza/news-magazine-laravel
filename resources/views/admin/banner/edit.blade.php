<x-admin.layout.master>

    <x-slot name="title">Create Banner</x-slot>

    <x-admin.modify-title :name="'Edit Banner'"/>

    <section class="row my-3">
        <section class="col-12">

            <x-admin.banner.edit.form :banner="$banner"/>

        </section>
    </section>

</x-admin.layout.master>
