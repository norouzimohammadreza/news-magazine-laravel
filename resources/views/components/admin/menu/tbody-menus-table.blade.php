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
        <a role="button" class="btn btn-sm btn-primary text-white" href="{{route('menu.edit',[$menu])}}">edit</a>
        <a role="button" class="btn btn-sm btn-danger text-white" href="">delete</a>
    </td>
</tr>
@endforeach
</tbody>
