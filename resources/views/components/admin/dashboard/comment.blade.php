<div class="col-sm-6 col-lg-3">
    <a href="{{route('comment.index')}}" class="text-decoration-none">
        <div class="card text-white bg-neon-life mb-3">
            <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-comments">

                    </i> Comment</span> <span class="badge badge-pill right">{{$commentsCount}}</span></div>
            <div class="card-body">
                <section class="d-flex justify-content-between align-items-center font-12">
                    <span class=""><i class="far fa-eye-slash"></i> Unseen <span class="badge badge-pill mx-1"></span>{{$unseenComments}}</span>
                    <span class=""><i class="far fa-check-circle"></i> Approved <span class="badge badge-pill mx-1"></span>{{$approvedComments}}</span>
                </section>
            </div>
        </div>
    </a>
</div>
