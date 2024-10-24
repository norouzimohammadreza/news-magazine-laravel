<form method="post" action="{{route('menu.update',[$menu])}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">{{__('dashboard.title')}}</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$menu->title}}" >
    </div>

    <div class="form-group">
        <label for="url">{{__('validation.attributes.url')}}</label>
        <input type="text" class="form-control" id="url" name="url" value="{{$menu->url}}" >
    </div>

    <div class="form-group">
        <label for="parent_id">{{__('menu.parent')}}</label>
        <select name="parent_id" id="parent_id" class="form-control" autofocus>
            <option value="{{0}}" {{($menu->parent_id==null)?'selected':''}}>root</option>
            @foreach($menus as $menuForMenus)
            <option value="{{$menuForMenus->id}}"
                {{($menuForMenus->id==$menu->parent_id)?'selected':'' }}>{{$menuForMenus->title}}</option>
            @endforeach
        </select>

    </div>

    <x-admin.ui.submit-button>
        <x-slot name="button">{{__('dashboard.update')}}</x-slot>
    </x-admin.ui.submit-button>
</form>
