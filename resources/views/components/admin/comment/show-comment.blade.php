@props([
    'comments'
])
<tbody>
    @foreach ($comments as $comment )
    <tr>
    <td>{{ $comment->id }}</td>
    <td>{{ $comment->user->name }}</td>
    <td>{{ $comment->post->title }}</td>
    <td>{{ $comment->body }}</td>
    <td>@if($comment->status_id==2){{__('comment.approved')}} @else {{__('comment.unapproved')}} @endif</td>
    <td>
        @if($comment->status_id == 0 || $comment->status_id ==1)
            <x-admin.ui.modify-button class="btn btn-sm btn-success text-white"
                                      url="{{route('comment.status',$comment)}}"
                                      name="{{__('comment.click to approve')}}"/>
        @else
            <x-admin.ui.modify-button class="btn btn-sm btn-warning text-white"
                                      url="{{route('comment.status',$comment)}}"
                                      name="{{__('comment.click to unapprove')}}"/>
        @endif
    </td>
    </tr>
    @endforeach
    </tbody>
