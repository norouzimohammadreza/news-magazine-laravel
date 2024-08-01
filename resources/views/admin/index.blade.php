<x-admin.layout.master>
    <x-slot name="title">Dashboard</x-slot>
    <div class="row mt-3">
        <x-admin.dashboard.category>
            <x-slot name="categoriesCount">{{$categoriesCount}}</x-slot>
        </x-admin.dashboard.category>
        <x-admin.dashboard.user>
            <x-slot name="usersCount">{{$usersCount}}</x-slot>
            <x-slot name="adminsCount">{{$adminsCount}}</x-slot>
            <x-slot name="allUser">{{$adminsCount+$usersCount}}</x-slot>
        </x-admin.dashboard.user>
        <x-admin.dashboard.view-component>
            <x-slot name="views">{{$views}}</x-slot>
            <x-slot name="postsCount">{{$postsCount}}</x-slot>
        </x-admin.dashboard.view-component>
        <x-admin.dashboard.comment>
            <x-slot name="commentsCount">{{$commentsCount}}</x-slot>
            <x-slot name="unseenComments">{{$unseenComments}}</x-slot>
            <x-slot name="approvedComments">{{$approvedComments}}</x-slot>
        </x-admin.dashboard.comment>

    <x-admin.dashboard.show-table :mostViewsPosts="$mostViewsPosts"
                                  :mostCommentsPosts="$mostCommentsPosts"
                                  :mostCommentsUsers="$mostCommentsUsers"/>

    </div>
</x-admin.layout.master>

