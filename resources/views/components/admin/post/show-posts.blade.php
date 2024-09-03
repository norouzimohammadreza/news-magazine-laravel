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
            <div class="d-flex">
            <a role="button" class="btn btn-sm btn-primary text-white ms-2 my-0 mx-1" href="{{ route('post.edit',[$post]) }}">edit</a>
                <x-admin.ui.delete-component>
                    <x-slot name="route">{{ route('post.destroy',[$post]) }}</x-slot>
                    <x-slot name="cssClass">btn btn-sm btn-danger text-white ms-2 my-0 mx-1</x-slot>
                </x-admin.ui.delete-component>
            </div>
        </td>
    </tr>
@endforeach
</tbody>
