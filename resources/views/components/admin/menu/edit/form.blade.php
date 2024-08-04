<form method="post" action="{{route('menu.update',[$menu])}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$menu->title}}" >
    </div>

    <div class="form-group">
        <label for="url">url</label>
        <input type="text" class="form-control" id="url" name="url" value="{{$menu->url}}" >
    </div>

    <div class="form-group">
        <label for="parent_id">parent ID</label>
        <select name="parent_id" id="parent_id" class="form-control" autofocus>
            <option value="{{0}}" {{($menu->parent_id==null)?'selected':''}}>root</option>
            @foreach($menus as $menuForMenus)
            <option value="{{$menuForMenus->id}}"
                {{($menuForMenus->id==$menu->parent_id)?'selected':'' }}>{{$menuForMenus->title}}</option>
            @endforeach
        </select>

    </div>

    <button type="submit" class="btn btn-primary btn-sm">update</button>
</form>
