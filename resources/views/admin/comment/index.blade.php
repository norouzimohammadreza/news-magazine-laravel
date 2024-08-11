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
            <tbody>
                @foreach ($comments as $comment )
                <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->user->name }}</td>
                <td>{{ $comment->post->title }}</td>
                <td>{{ $comment->body }}</td>
                <td>{{ $comment->status }}</td>
                <td>
                    @if($comment->status =='seen' ||$comment->status =='unseen' )
                    <a role="button " class="btn btn-sm btn-success text-white " href="{{ route('comment.status',$comment) }}">click to approved</a>
                    @else
                    <a role="button " class="btn btn-sm btn-warning text-white " href="{{ route('comment.status',$comment) }}">click not to approved</a>
                    @endif
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                </section>
</x-admin.layout.master>
