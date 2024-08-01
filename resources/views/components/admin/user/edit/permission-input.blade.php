<div class="form-group">
    <label for="is_admin">permission</label>
    <select name="is_admin" id="is_admin" class="form-control" autofocus>
        <option value="{{0}}"{{($user->is_admin)? 'selected':''}}>User</option>
        <option value="{{1}}"{{($user->is_admin)? 'selected':''}}>Admin</option>
    </select>
    <p class="text-danger">@error('is_admin'){{$message}}  @enderror</p>
</div>
