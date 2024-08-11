<x-admin.layout.master>
    <x-slot name="title">Create Banner</x-slot>
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Create Banner</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">

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

                <button type="submit" class="btn btn-primary btn-sm">store</button>
            </form>
        </section>
    </section>

</x-admin.layout>
