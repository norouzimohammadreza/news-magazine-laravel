<x-admin.layout.master >
    <x-slot name="title">Comments Management</x-slot>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
        <h1 class="h5 "><i class="fas fa-newspaper "></i> Comments</h1>
    </div>
    <section class="table-responsive ">
        <table class="table table-striped table-sm ">
            <caption>List of comments</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>username</th>
                    <th>post</th>
                    <th>comment</th>
                    <th>status</th>
                    <th>setting</th>
                </tr>
            </thead>
<x-admin.comment.show-comment :comments="$comments"/>
                </table>
                </section>
</x-admin.layout.master>
