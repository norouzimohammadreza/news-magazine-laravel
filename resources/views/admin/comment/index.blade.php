<x-admin.layout.master>
    <x-slot name="title">{{__('comment.comments_management')}}</x-slot>

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
        <h1 class="h5 "><i class="fas fa-newspaper "></i> {{__('comment.comments_management')}}</h1>
    </div>

    <section class="table-responsive ">
        <table class="table table-striped table-sm ">
            <caption>{{__('comment.list_of_comments')}}</caption>
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('dashboard.username')}}</th>
                <th>{{__('post.post')}}</th>
                <th>{{__('comment.comment')}}</th>
                <th>{{__('comment.status')}}</th>
                <th>{{__('dashboard.setting')}}</th>
            </tr>
            </thead>

            <x-admin.comment.show-comment :comments="$comments"/>

        </table>
        {{$comments->links()}}
    </section>

</x-admin.layout.master>
