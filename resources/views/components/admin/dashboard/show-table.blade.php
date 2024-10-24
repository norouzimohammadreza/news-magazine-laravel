<div class="row mt-2 col-12">
    <div class="col-4">
        <h2 class="h6 pb-0 mb-0">
            {{__('dashboard.most_viewed_posts')}}
        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('dashboard.title')}}</th>
                    <th>{{__('dashboard.view')}}</th>
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
            {{__('dashboard.most_commented_posts')}}

        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('dashboard.title')}}</th>
                    <th>{{__('dashboard.comments')}}</th>
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
            {{__('dashboard.comments')}}
        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('dashboard.username')}}</th>
                    <th>{{__('dashboard.comment')}}</th>
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
