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


            <x-admin.ui.modify-button class="btn-warning btn-dark"
                                      url="{{route('user.breaking-news',[$post])}}"
                                      name="{{($post['breaking_news'] == 1)? 'remove breaking news'  : 'add breaking news'}}"/>
            <x-admin.ui.modify-button class="btn-warning btn-dark"
                                      url="{{route('user.is-selected',[$post])}}"
                                      name="{{($post['selected'] == 1)? 'remove selected'  : 'add selected'}}"/>

            <hr class="my-1" />
            <div class="d-flex">

                <x-admin.ui.modify-button class="btn-primary ms-2 my-0 mx-1"
                                          url="{{route('post.edit',[$post])}}"
                                          name="Edit"/>

                <x-admin.ui.delete-component>
                    <x-slot name="route">{{ route('post.destroy',[$post]) }}</x-slot>
                </x-admin.ui.delete-component>
            </div>
        </td>
    </tr>
@endforeach
</tbody>
