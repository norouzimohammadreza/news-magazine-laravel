<div class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>List of categories</caption>
        <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>setting</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>

            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>
                <a role="button" href="{{route('category.edit',[$category])}}" class="btn btn-sm btn-info my-0 mx-1 text-white">update</a>
                <form action="{{route('category.destroy',[$category])}}" method="post">
                    @csrf
                    @method('DELETE')
                <button type="submit" href="" class="btn btn-sm btn-danger my-0 mx-1 text-white">delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>

    </table>
</div>
