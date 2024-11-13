<x-admin.layout.admin>

    <x-slot name="title">{{__('post.create')}}</x-slot>

    <x-admin.modify-title :name="__('post.create')"/>

    <x-admin.post.ck-editor.css/>

    <section class="row my-3">
        <section class="col-12">
            <x-admin.post.create.form :categories="$categories"/>
        </section>
    </section>

    <x-admin.post.ck-editor.js/>

</x-admin.layout.admin>
