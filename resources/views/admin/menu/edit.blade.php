<x-admin.layout.master>
    <x-slot name="title">Edit Meno</x-slot>
    <x-admin.menu.edit.title/>

    <section class="row my-3">
        <section class="col-12">
<x-admin.menu.edit.form :menu="$menu"
                        :menus="$menus"/>
        </section>
    </section>


</x-admin.layout.master>
