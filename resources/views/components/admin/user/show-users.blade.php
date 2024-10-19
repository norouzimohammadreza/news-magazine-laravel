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
                <a role="button" class="btn btn-sm btn-success text-white my-0 mx-1"
                   href="{{route('user.is-admin',[$user])}}">click to be admin</a>
            @else
                <a role="button" class="btn btn-sm btn-warning text-white my-0 mx-1"
                   href="{{route('user.is-admin',[$user])}}">click not to be admin</a>
            @endif
            <x-admin.ui.modify-button class="btn btn-sm btn-primary my-0 mx-1 text-white"
                                      url="{{route('user.edit',$user)}}"
                                      name="Edit"/>
            <x-admin.ui.delete-component>
                <x-slot name="route">{{route('user.destroy',$user)}}</x-slot>
            </x-admin.ui.delete-component>
        </td>
    </tr>
@endforeach
</tbody>
