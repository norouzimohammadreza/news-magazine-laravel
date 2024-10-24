<x-admin.layout.master>
    <x-slot name="title">{{__('menu.create_menu')}}</x-slot>

    <x-admin.modify-title :name="__('menu.create_menu')"/>

    <section class="row my-3">
        <section class="col-12">

            <x-admin.menu.create.form :menus="$menus"/>

        </section>
    </section>

</x-admin.layout.master>
