<form method="post" action="{{route('menu.store')}}">
    @csrf
    <div class="form-group">
        <label for="title">{{__('dashboard.title')}}</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="{{__('menu.enter_title')}} ..." >
        <p class="text-danger">@error('title'){{$message}}@enderror</p>
    </div>

    <div class="form-group">
        <label for="url">{{__('validation.attributes.url')}}</label>
        <input type="text" class="form-control" id="url" name="url" placeholder="{{__('menu.enter_url')}} ..." >
        <p class="text-danger">@error('url'){{$message}}@enderror</p>
    </div>

    <div class="form-group">
        <label for="parent_id">{{__('menu.parent')}}</label>
        <select name="parent_id" id="parent_id" class="form-control" autofocus>
            <option value="{{0}}">root</option>
            @foreach($menus as $menu)
            <option value="{{$menu->id}}">{{$menu->title}}</option>
            @endforeach
        </select>
        <p class="text-danger">@error('parent_id'){{$message}}@enderror</p>
    </div>

    <x-admin.ui.submit-button>
        <x-slot name="button">{{__('dashboard.store')}}</x-slot>
    </x-admin.ui.submit-button>
</form>
