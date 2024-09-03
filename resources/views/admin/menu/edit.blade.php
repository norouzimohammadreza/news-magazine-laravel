<x-admin.layout.master>
    <x-slot name="title">Edit Menu</x-slot>
    <x-admin.modify-title :name="'Edit Menu'" />

    <section class="row my-3">
        <section class="col-12">
<x-admin.menu.edit.form :menu="$menu"
                        :menus="$menus"/>
        </section>
    </section>


</x-admin.layout.master>
