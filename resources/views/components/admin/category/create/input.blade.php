<div class="form-group">
    <label for="title">{{__('dashboard.title')}}</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="{{__('category.enter')}} ...">
    <p class="text-danger">@error('title'){{$message}}@enderror</p>
</div>
