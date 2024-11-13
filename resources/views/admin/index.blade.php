<x-admin.layout.admin>

    <x-slot name="title">{{__('dashboard.dashboard')}}</x-slot>

    <div class="row mt-3">

        <x-admin.dashboard.category categories-count="{{$categoriesCount}}" />

        <x-admin.dashboard.user users-count="{{$usersCount}}"
                                admins-count="{{$adminsCount}}"
                                all-user="{{$adminsCount+$usersCount}}"/>

        <x-admin.dashboard.view-component views="{{$views}}"
                                          posts-count="{{$postsCount}}" />

        <x-admin.dashboard.comment comments-count="{{$commentsCount}}"
                                   unseen-comments="{{$unseenComments}}"
                                   approved-comments="{{$approvedComments}}"/>

        <x-admin.dashboard.show-table :mostViewsPosts="$mostViewsPosts"
                                      :mostCommentsPosts="$mostCommentsPosts"
                                      :mostCommentsUsers="$mostCommentsUsers"/>

    </div>
</x-admin.layout.admin>

