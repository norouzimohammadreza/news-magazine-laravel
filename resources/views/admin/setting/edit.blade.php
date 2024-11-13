<x-admin.layout.admin>

    <x-slot name="title">{{__('setting.website')}}</x-slot>

    <x-admin.modify-title :name="__('setting.website')"/>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="{{route('setting.update',[$setting])}}" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">{{__('validation.attributes.title')}}</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$setting->title}}"
                           autofocus>
                    <p class="text-danger">@error('title') {{$message}}  @enderror</p>
                </div>

                <div class="form-group">
                    <label for="description">{{__('validation.attributes.description')}}</label>
                    <input type="text" class="form-control" id="description" name="description"
                           value="{{$setting->description}}" autofocus>
                    <p class="text-danger">@error('description') {{$message}}  @enderror</p>
                </div>

                <div class="form-group">
                    <label for="keywords">{{__('validation.attributes.keyword')}}</label>
                    <input type="text" class="form-control" id="keyword" name="keyword" value="{{$setting->keyword}}"
                           autofocus>
                    <p class="text-danger">@error('keyword') {{$message}}  @enderror</p>
                </div>

                <div class="form-group">
                    <hr/>
                    <label for="logo">{{__('validation.attributes.logo')}}</label>
                    <input type="file" id="logo" name="logo" class="form-control-file" autofocus>
                    <img style="width: 100px;" src="{{asset('setting/'.$setting->logo)}}" alt="">
                    <p class="text-danger">@error('logo') {{$message}}  @enderror</p>
                </div>

                <div class="form-group">
                    <hr/>
                    <label for="icon">{{__('validation.attributes.icon')}}</label>
                    <input type="file" id="icon" name="icon" class="form-control-file" autofocus>
                    <img style="width: 100px;" src="{{asset('setting/'.$setting->icon)}}" alt="">
                    <p class="text-danger">@error('icon') {{$message}}  @enderror</p>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">{{__('dashboard.update')}}</button>
            </form>
        </section>
    </section>

</x-admin.layout.admin>
