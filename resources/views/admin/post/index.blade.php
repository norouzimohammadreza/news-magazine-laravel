<x-admin.layout.master>
    <x-slot name="title">Post Management</x-slot>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i> Articles</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="" class="btn btn-sm btn-success">create</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of posts</caption>
            <thead>
            <tr>
                <th>#</th>
                <th>title</th>
                <th>summary</th>
                <th>view</th>
                <th>status</th>
                <th>Arthur</th>
                <th>category</th>
                <th>image</th>
                <th>setting</th>
            </tr>
            </thead>

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
                <td><img style="width: 80px;" src="{{asset($post['image'])}}" alt=""></td>
                <td style="width: 25rem;">
                    <a role="button" class="btn btn-sm btn-warning btn-dark text-white" href="{{route('user.breaking-news',[$post])}}">
                            @if($post['breaking_news'] == 1)  remove breaking news @else add breaking news @endif
                    </a>
                    <a role="button" class="btn btn-sm btn-warning btn-dark text-white" href="{{route('user.is-selected',[$post])}}">
                            @if ($post['selected'] == 1) remove selected  @else add selected @endif
                    </a>
                    <hr class="my-1" />
                    <a role="button" class="btn btn-sm btn-primary text-white" href="">edit</a>
                    <a role="button" class="btn btn-sm btn-danger text-white" href="">delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>
    </div>

</x-admin.layout.master>

