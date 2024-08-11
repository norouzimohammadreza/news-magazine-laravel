<x-admin.layout.master>
    <x-slot name="title">Edit Post</x-slot>
    <x-admin.post.ck-editor.css/>

<x-admin.post.header/>

    <section class="row my-3">
        <section class="col-12">
<x-admin.post.edit.form :categories="$categories"
                        :post="$post"/>

        </section>
    </section>

    <x-admin.post.ck-editor.js/>
</x-admin.layout.master>
