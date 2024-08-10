<x-admin.layout.master>
    <x-slot name="title">Post Management</x-slot>
  <x-admin.post.header/>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of posts</caption>
            <thead>
            <tr>
                <th>#</th>
                <th>title</th>
                <th>summary</th>
                <th>view</th>
                <th>status</th>
                <th>Arthur</th>
                <th>category</th>
                <th>image</th>
                <th>setting</th>
            </tr>
            </thead>

<x-admin.post.show-posts :posts="$posts"/>

        </table>
    </div>

</x-admin.layout.master>

