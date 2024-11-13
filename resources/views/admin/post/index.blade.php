<x-admin.layout.admin>

    <x-slot name="title">{{__('post.post_management')}}</x-slot>

    <x-admin.dashboard-title>
        <x-slot name="title">{{__('post.post_management')}}</x-slot>
        <x-slot name="goto">{{route('post.create')}}</x-slot>
        <x-slot name="create">{{__('dashboard.create')}}</x-slot>
    </x-admin.dashboard-title>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>{{__('post.list_of_posts')}}</caption>
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('validation.attributes.title')}}</th>
                <th>{{__('validation.attributes.summary')}}</th>
                <th>{{__('dashboard.view')}}</th>
                <th>{{__('post.status')}}</th>
                <th>{{__('post.author')}}</th>
                <th>{{__('post.category')}}</th>
                <th>{{__('validation.attributes.image')}}</th>
                <th>{{__('dashboard.setting')}}</th>
            </tr>
            </thead>

            <x-admin.post.show-posts :posts="$posts"/>

        </table>
        {{$posts->links()}}
    </div>

</x-admin.layout.admin>

