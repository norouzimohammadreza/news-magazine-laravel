<x-admin.layout.master>

    <x-slot name="title">{{__('banner.create')}}</x-slot>

    <x-admin.modify-title :name="__('banner.create')"/>

    <section class="row my-3">
        <section class="col-12">
            <x-admin.banner.create.form/>
        </section>
    </section>

</x-admin.layout.master>
