<form method="post" action="{{route('menu.store')}}">
    @csrf
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title ..." >
        <p class="text-danger">@error('title'){{$message}}@enderror</p>
    </div>

    <div class="form-group">
        <label for="url">url</label>
        <input type="text" class="form-control" id="url" name="url" placeholder="Enter url ..." >
        <p class="text-danger">@error('url'){{$message}}@enderror</p>
    </div>

    <div class="form-group">
        <label for="parent_id">parent</label>
        <select name="parent_id" id="parent_id" class="form-control" autofocus>
            <option value="{{0}}">root</option>
            @foreach($menus as $menu)
            <option value="{{$menu->id}}">{{$menu->title}}</option>
            @endforeach
        </select>
        <p class="text-danger">@error('parent_id'){{$message}}@enderror</p>
    </div>

<x-admin.menu.create.submit-button/>
</form>
