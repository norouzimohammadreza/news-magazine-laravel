<div class="form-group">
    <label for="name">{{__('validation.attributes.name')}}</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
    <p class="text-danger">@error('name'){{$message}}  @enderror</p>
</div>
