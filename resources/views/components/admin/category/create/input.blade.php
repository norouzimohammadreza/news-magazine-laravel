<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title ...">
    <p class="text-danger">@error('title'){{$message}}@enderror</p>
</div>
