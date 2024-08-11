<x-admin.layout.master >
    <x-slot name="title">Comments Management</x-slot>
    <x-admin.comment.title/>
    <section class="table-responsive ">
        <table class="table table-striped table-sm ">
            <caption>List of comments</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>username</th>
                    <th>post</th>
                    <th>comment</th>
                    <th>status</th>
                    <th>setting</th>
                </tr>
            </thead>
<x-admin.comment.show-comment :comments="$comments"/>
                </table>
                </section>
</x-admin.layout.master>
