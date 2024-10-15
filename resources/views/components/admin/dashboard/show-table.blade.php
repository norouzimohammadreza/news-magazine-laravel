<div class="row mt-2 col-12">
    <div class="col-4">
        <h2 class="h6 pb-0 mb-0">
            Most viewed posts
        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>view</th>
                </tr>
                </thead>
                <tbody>

                @foreach($mostViewsPosts as $mostViewsPost)
                <tr>
                    <td>{{$mostViewsPost->id}}</td>
                    <td>{{$mostViewsPost->title}}</td>

                    <td><span class="badge badge-secondary">{{$mostViewsPost->view}}</span></td>
                </tr>
                @endforeach

            </tbody>
            </table>
        </div>
    </div>
    <div class="col-4">
        <h2 class="h6 pb-0 mb-0">
            Most commented posts

        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>comment</th>
                </tr>
                </thead>
                <tbody>
            @foreach($mostCommentsPosts as $mostCommentsPost)
                <tr>
                    <td>{{$mostCommentsPost->id}}</td>
                    <td>{{$mostCommentsPost->title}}</td>
                    <td><span class="badge badge-success">{{$mostCommentsPost->comment_count}}</span></td>
                </tr>
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-4">
        <h2 class="h6 pb-0 mb-0">
            Comments
        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>username</th>
                    <th>comment</th>
                </tr>
                </thead>
                <tbody>

        @foreach($mostCommentsUsers as $mostCommentsUser)
            @if($mostCommentsUser->comment_count>0)
                <tr>
                    <td>{{$mostCommentsUser->id}}</td>
                    <td>{{$mostCommentsUser->name}}</td>
                    <td><span class="badge badge-warning">{{$mostCommentsUser->comment_count}}</span></td>
                </tr>
            @endif
        @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
