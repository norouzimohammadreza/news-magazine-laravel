<x-admin.layout.master>
    <x-slot name="title">Create Post</x-slot>
    <x-admin.modify-title :name="'Create Post'" />
    <x-admin.post.ck-editor.css/>

    <section class="row my-3">
        <section class="col-12">
<x-admin.post.create.form :categories="$categories"/>
        </section>
    </section>

<x-admin.post.ck-editor.js/>
</x-admin.layout.master>
