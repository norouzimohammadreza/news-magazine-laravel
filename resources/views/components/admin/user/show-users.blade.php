<tbody>
@foreach($users as $user)
<tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{($user->is_admin)? 'admin':'user'}}</td>
    <td></td>
    <td class="d-flex">
        @if(!$user->is_admin)
        <a role="button" class="btn btn-sm btn-success text-white my-0 mx-1" href="{{route('user.is-admin',[$user])}}">click to be admin</a>
        @else
        <a role="button" class="btn btn-sm btn-warning text-white my-0 mx-1" href="{{route('user.is-admin',[$user])}}">click not to be admin</a>
        @endif
        <a role="button" class="btn btn-sm btn-primary text-white my-0 mx-1" href="{{route('user.edit',[$user])}}">edit</a>
            <form method="post" action="{{route('user.destroy',$user)}}">
                @csrf
                @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger text-white my-0 mx-1" href="">delete</button>
            </form>
    </td>
</tr>
@endforeach
</tbody>
