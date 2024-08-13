<tbody>
    @foreach ($banners as $banner)
    <tr>
        <td>{{ $banner->id }}</td>
        <td>{{ $banner->url }}</td>
        <td><img style="width: 80px;" src="{{ asset('banners/'.$banner->image) }}" alt=""></td>
        <td class="d-flex">
            <a role="button" class="btn btn-sm btn-primary text-white my-0 mx-1" href="{{ route('banner.edit',$banner) }}">edit</a>
            <form action="{{ route('banner.destroy',$banner) }}" method="post">
                @csrf
                @method('delete')
            <button type="submit" class="btn btn-sm btn-danger my-0 mx-1 text-white ms-2">delete</button>
        </form>
        </td>
    </tr>
    @endforeach
</tbody>
