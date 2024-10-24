<x-admin.layout.master>

    <x-slot name="title">{{__('banner.edit')}}</x-slot>

    <x-admin.modify-title :name="__('banner.edit')"/>

    <section class="row my-3">
        <section class="col-12">

            <x-admin.banner.edit.form :banner="$banner"/>

        </section>
    </section>

</x-admin.layout.master>
