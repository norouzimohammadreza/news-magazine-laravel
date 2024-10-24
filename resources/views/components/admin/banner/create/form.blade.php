<form method="post" action="{{ route('banner.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="url">{{__('validation.attributes.url')}}</label>
        <input type="text" class="form-control" id="url" name="url" placeholder="{{__('banner.enter')}} ..." autofocus>
        <p class="text-danger">@error('url') {{ $message }} @enderror</p>
    </div>


    <div class="form-group">
        <label for="image">{{__('validation.attributes.image')}}</label>
        <input type="file" id="image" name="image" class="form-control-file" autofocus>
        <p class="text-danger">@error('image') {{ $message }} @enderror</p>
    </div>
    <x-admin.ui.submit-button>
        <x-slot name="button">{{__('dashboard.store')}}</x-slot>
    </x-admin.ui.submit-button>
</form>
