<x-admin.layout.master>

    <x-slot name="title">Post Management</x-slot>

    <x-admin.dashboard-title>
        <x-slot name="title">Posts</x-slot>
        <x-slot name="goto">{{route('post.create')}}</x-slot>
        <x-slot name="create">create</x-slot>
    </x-admin.dashboard-title>

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
        {{$posts->links()}}
    </div>

</x-admin.layout.master>

