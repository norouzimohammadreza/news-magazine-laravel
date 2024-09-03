<form method="post" action="{{ route('banner.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="url">Url</label>
        <input type="text" class="form-control" id="url" name="url" placeholder="Enter url ..." autofocus>
        <p class="text-danger">@error('url') {{ $message }} @enderror</p>
    </div>


    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control-file"  autofocus>
        <p class="text-danger">@error('image') {{ $message }} @enderror</p>
    </div>
    <x-admin.ui.submit-button>
        <x-slot name="button">Store</x-slot>
    </x-admin.ui.submit-button>
</form>
