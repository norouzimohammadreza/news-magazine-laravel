<x-admin.layout.master>
    <x-slot name="title">Create Banner</x-slot>
    <x-admin.modify-title :name="'Create Banner'" />
    <section class="row my-3">
        <section class="col-12">
        <x-admin.banner.create.form/>
        </section>
    </section>

</x-admin.layout.master>
