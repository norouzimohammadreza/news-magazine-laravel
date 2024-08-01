<x-admin.layout.master>
    <x-slot name="title">Set Setting</x-slot>
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Set Web Setting</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="{{route('setting.update',[$setting])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$setting->title}}" autofocus>
                    <p class="text-danger">@error('title') {{$message}}  @enderror</p>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$setting->description}}" autofocus>
                    <p class="text-danger">@error('description') {{$message}}  @enderror</p>
                </div>

                <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <input type="text" class="form-control" id="keyword" name="keyword" value="{{$setting->keyword}}" autofocus>
                    <p class="text-danger">@error('keyword') {{$message}}  @enderror</p>
                </div>


                <div class="form-group">


                    <hr/>

                    <label for="logo">Logo</label>
                    <input type="file" id="logo" name="logo" class="form-control-file" autofocus>
                    <img style="width: 100px;" src="{{asset('setting/'.$setting->logo)}}" alt="">
                    <p class="text-danger">@error('logo') {{$message}}  @enderror</p>
                </div>

                <div class="form-group">


                    <hr/>

                    <label for="icon">Icon</label>
                    <input type="file" id="icon" name="icon" class="form-control-file" autofocus>
                    <img style="width: 100px;" src="{{asset('setting/'.$setting->icon)}}" alt="">
                    <p class="text-danger">@error('icon') {{$message}}  @enderror</p>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">set</button>
            </form>
        </section>
    </section>


</x-admin.layout.master>
