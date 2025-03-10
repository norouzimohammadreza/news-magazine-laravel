@props([
    'banner',
])
<form method="post" action="{{ route('banner.update',$banner) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="url">{{__('validation.attributes.url')}}</label>
        <input type="text" class="form-control" id="url" name="url" value="{{ $banner->url }}" autofocus>
        <p class="text-danger">@error('url') {{ $message }} @enderror</p>
    </div>


    <div class="form-group">
        <label for="image">{{__('validation.attributes.image')}}</label>
        <input type="file" id="image" name="image" class="form-control-file"  autofocus>
        <img style="width: 80px;" src="{{ asset('banners/'.$banner->image) }}" alt="">
    </td>
    <p class="text-danger">@error('image') {{ $message }} @enderror</p>
    </div>

    <x-admin.ui.submit-button>
        <x-slot name="button">{{__('dashboard.update')}}</x-slot>
    </x-admin.ui.submit-button>
</form>
