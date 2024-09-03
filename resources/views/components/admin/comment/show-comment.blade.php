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
            <x-admin.ui.modify-button :css-class="'btn btn-sm btn-success text-white'"
                                      :url="route('comment.status',$comment)"
                                      :name="'click to approved'"/>
        @else
            <x-admin.ui.modify-button :css-class="'btn btn-sm btn-warning text-white'"
                                      :url="route('comment.status',$comment)"
                                      :name="'click not to approved'"/>
        @endif
    </td>
    </tr>
    @endforeach
    </tbody>
