<tbody>
@foreach ($posts as $post)
    <tr>
        <td>
            <a class="text-primary" href="">{{$post->id}}</a>
        </td>
        <td>
        {{$post->title}}
        <td>{{ substr($post->summary, 0, 50)}} </td>
        <td>
            {{$post->view}}
        </td>
        <td>@if($post['breaking_news'] == 1)
                <span class="badge badge-success">#breaking_news</span>
            @endif
            @if($post['selected'] == 1)
                <span class="badge badge-dark" >#editor_selected</span>
            @endif

        </td>
        <td>
            {{ $post->user->name}}
        </td>
        <td>
            {{$post->category->title}}
        </td>
        <td><img style="width: 80px;" src="{{ asset('posts/'.$post->image) }}" alt=""></td>
        <td style="width: 25rem;">
            <a role="button" class="btn btn-sm btn-warning btn-dark text-white" href="{{route('user.breaking-news',[$post])}}">
                @if($post['breaking_news'] == 1)  remove breaking news @else add breaking news @endif
            </a>
            <a role="button" class="btn btn-sm btn-warning btn-dark text-white" href="{{route('user.is-selected',[$post])}}">
                @if ($post['selected'] == 1) remove selected  @else add selected @endif
            </a>
            <hr class="my-1" />
            <a role="button" class="btn btn-sm btn-primary text-white" href="{{ route('post.edit',[$post]) }}">edit</a>
            <form action="{{ route('post.destroy',[$post]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-danger text-white" href="">delete</button>
            </form>

        </td>
    </tr>
@endforeach
</tbody>
