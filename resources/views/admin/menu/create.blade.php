<x-admin.layout.master>
    <x-slot name="title">Create Menu</x-slot>
<x-admin.menu.create.title/>

    <section class="row my-3">
        <section class="col-12">
        <x-admin.menu.create.form :menus="$menus"/>
        </section>
    </section>

</x-admin.layout.master>
