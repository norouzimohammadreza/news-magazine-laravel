<tbody>
@foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{($user->is_admin)? __('user.admin'):__('user.user')}}</td>
        <td>{{$user->created_at}}</td>
        <td class="d-flex">
            @if(!$user->is_admin)
                <a role="button" class="btn btn-sm btn-success text-white my-0 mx-1"
                   href="{{route('user.is-admin',[$user])}}">{{__('user.click_admin')}}</a>
            @else
                <a role="button" class="btn btn-sm btn-warning text-white my-0 mx-1"
                   href="{{route('user.is-admin',[$user])}}">{{__('user.click_user')}}</a>
            @endif
            <x-admin.ui.modify-button class="btn btn-sm btn-primary my-0 mx-1 text-white"
                                      url="{{route('user.edit',$user)}}"
                                      name="{{__('dashboard.edit')}}"/>
            <x-admin.ui.delete-component>
                <x-slot name="route">{{route('user.destroy',$user)}}</x-slot>
            </x-admin.ui.delete-component>
        </td>
    </tr>
@endforeach
</tbody>
