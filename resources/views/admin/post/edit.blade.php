<x-admin.layout.admin>

    <x-slot name="title">{{__('post.edit')}}</x-slot>

    <x-admin.post.ck-editor.css/>

    <x-admin.modify-title :name="__('post.edit')"/>

    <section class="row my-3">
        <section class="col-12">

            <x-admin.post.edit.form :categories="$categories"
                                    :post="$post"/>

        </section>
    </section>

    <x-admin.post.ck-editor.js/>

</x-admin.layout.admin>
