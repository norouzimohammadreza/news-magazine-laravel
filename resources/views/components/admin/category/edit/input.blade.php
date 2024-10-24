<div class="form-group">
    <label for="title">{{__('category.edit')}}</label>
    <input type="text" class="form-control" id="title" name="title" value="{{$category->title}}">
    <p class="text-danger">@error('title') {{$message}} @enderror</p>
</div>
