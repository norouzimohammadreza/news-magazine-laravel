<div class="form-group">
    <label for="is_admin">{{__('user.permission')}}</label>
    <select name="is_admin" id="is_admin" class="form-control" autofocus>
        <option value="{{0}}"{{($user->is_admin)? 'selected':''}}>{{__('user.user')}}</option>
        <option value="{{1}}"{{($user->is_admin)? 'selected':''}}>{{__('user.admin')}}</option>
    </select>
    <p class="text-danger">@error('is_admin'){{$message}}  @enderror</p>
</div>
