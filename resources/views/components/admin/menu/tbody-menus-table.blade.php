<tbody>
@foreach($menus as $menu)
<tr>
    <td>{{$menu->id}}</td>
    <td>{{$menu->title}}</td>
    <td><a href="{{$menu->url}}">{{$menu->title}}</a></td>
    @if(is_null($menu->parent_id))
        <td>{{__('menu.none')}}</td>
    @else
        @if($menu->submenu)
            <td>{{$menu->submenu->title}}</td>
        @else
            <td>{{__('menu.none')}}</td>
        @endif
    @endif
    <td>
        <div class="d-flex">
            <x-admin.ui.modify-button class="btn-primary ms-2 my-0 mx-1"
                                      url="{{route('menu.edit',[$menu])}}"
                                      name="{{__('dashboard.edit')}}"/>
        <x-admin.ui.delete-component>
            <x-slot name="route">{{route('menu.destroy',[$menu])}}</x-slot>
        </x-admin.ui.delete-component>
        </div>
    </td>
</tr>
@endforeach
</tbody>
