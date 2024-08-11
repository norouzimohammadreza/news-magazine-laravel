<form method="post" action="{{ route('post.update',[$post]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}"  autofocus>
        <p class="text-danger">@error('title'){{ $message }} @enderror </p>
    </div>

    <div class="form-group">
        <label for="cat_id">Category</label>
        <select name="category_id" id="category_id" class="form-control"  autofocus>
       @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ ($category->id==$post->category_id)?'selected':'' }} >{{ $category->title }}</option>
      @endforeach
        </select>
        <p class="text-danger">@error('category_id'){{ $message }} @enderror </p>
     </div>

<div class="form-group">
<label for="image">Image</label>
<input type="file" id="image" name="image" class="form-control-file" autofocus>
<img style="width: 80px;" src="<?= asset('posts/'.$post['image']) ?>" alt="">
<p class="text-danger">@error('image'){{ $message }} @enderror </p>
</div>

<div class="form-group">
<label for="published_at">published at</label>
<input type="text" class="form-control d-none" id="published_at" name="published_at"  autofocus>
<input type="text" class="form-control" id="published_at_view" value="{{ $post->published_at }}"  autofocus>
<p class="text-danger">@error('published_at'){{ $message }} @enderror </p>
</div>

<div class="form-group">
<label for="summary">summary</label>
<textarea class="form-control" id="summary" name="summary"  rows="3" autofocus>{{ $post->summary }}"</textarea>
<p class="text-danger">@error('summary'){{ $message }} @enderror </p>
</div>

<div class="form-group">
<label for="body">body</label>
<textarea class="form-control" id="body" name="body"  rows="5"  autofocus>{{ $post->body }}</textarea>
<p class="text-danger">@error('body'){{ $message }} @enderror </p>
</div>

<x-admin.post.edit.update-button/>
</form>
