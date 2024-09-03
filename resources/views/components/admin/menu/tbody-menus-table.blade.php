<tbody>
@foreach($menus as $menu)
<tr>
    <td>{{$menu->id}}</td>
    <td>{{$menu->title}}</td>
    <td><a href="{{$menu->url}}">{{$menu->title}}</a></td>
    @if(is_null($menu->parent_id))
        <td>none</td>
    @else
        @if($menu->submenu)
            <td>{{$menu->submenu->title}}</td>
        @else
            <td>No submenu</td>
        @endif
    @endif
    <td>
        <div class="d-flex">
        <a role="button" class="btn btn-sm btn-primary text-white ms-2" href="{{route('menu.edit',[$menu])}}">edit</a>
        <x-admin.ui.delete-component>
            <x-slot name="route">{{route('menu.destroy',[$menu])}}</x-slot>
            <x-slot name="cssClass">btn btn-sm btn-danger my-0 mx-1 text-white ms-2</x-slot>
        </x-admin.ui.delete-component>
        </div>
    </td>
</tr>
@endforeach
</tbody>
