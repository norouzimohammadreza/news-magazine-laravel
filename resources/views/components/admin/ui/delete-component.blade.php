<form action="{{$route}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="{{$cssClass}}">delete</button>
</form>
