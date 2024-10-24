<div class="col-sm-6 col-lg-3">
    <a href="{{route('post.index')}}" class="text-decoration-none">
        <div class="card text-white bg-dracula mb-3">
            <div class="card-header d-flex justify-content-between align-items-center"><span><i
                        class="fas fa-newspaper"></i> {{__('dashboard.articles')}}</span> <span class="badge badge-pill right">{{$postsCount}}</span></div>
            <div class="card-body">
                <section class="d-flex justify-content-between align-items-center font-12">
                    <span class=""><i class="fas fa-bolt"></i> {{__('dashboard.views')}} <span class="badge badge-pill mx-1">{{$views}}</span></span>
                </section>
            </div>
        </div>
    </a>
</div>
