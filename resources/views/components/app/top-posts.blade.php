<section class="top-post-area pt-10">
    <div class="container no-padding">
        <div class="row small-gutters">
            <div class="col-lg-8 top-post-left">
                <div class="feature-image-thumb relative">
                    <div class="overlay overlay-bg"></div>
                    <img class="img-fluid" src="{{asset('posts/'.$topSelectedPosts[0]->image)}}" alt="">
                </div>

                <div class="top-post-details">
                    <ul class="tags">
                        <li>
                            <a href="{{route('category',$topSelectedPosts[0]->category_id)}}">{{$topSelectedPosts[0]->category->title}}</a>
                        </li>
                    </ul>
                    <a href="{{route('post',$topSelectedPosts[0])}}"> <h3 class="text-info">{{$topSelectedPosts[0]->title}}</h3></a>
                    <ul class="meta bg-secondary">
                        <li><span class="lnr lnr-user"> {{$topSelectedPosts[0]->user->name}}</span></li>
                        <li>
                            <span class="lnr lnr-calendar-full"> {{date($topSelectedPosts[0]->published_at)}}</span></li>
                        <li>

                                <span class="lnr lnr-bubble"> {{$topSelectedPosts[0]->comment_count}}</span></li>
                    </ul>
                </div>

            </div>
            <div class="col-lg-4 top-post-right">
                @isset($topSelectedPosts[1])
                <div class="single-top-post">
                    <div class="feature-image-thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="{{asset('posts/'.$topSelectedPosts[1]->image)}}" alt="">
                    </div>
                    <div class="top-post-details">
                        <ul class="tags">
                            <li>
                                <a href="{{route('category',$topSelectedPosts[1]->category_id)}}">{{$topSelectedPosts[1]->category->title}}</a>
                            </li>
                        </ul>
                        <a href="{{route('post',$topSelectedPosts[1])}}">
                            <h4>{{$topSelectedPosts[1]->title}}</h4>
                        </a>
                        <ul class="meta">
                            <li><span class="lnr lnr-user"> {{$topSelectedPosts[1]->user->name}}</span></li>
                            <li><span class="lnr lnr-calendar-full"> {{$topSelectedPosts[1]->published_at}}</span></li>
                            <li><span class="lnr lnr-bubble"> {{$topSelectedPosts[1]->approved_comments_count}}</span></li>
                        </ul>
                    </div>
                </div>
                @endisset
                @isset($topSelectedPosts[2])
                <div class="single-top-post mt-10">
                    <div class="feature-image-thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="{{asset('posts/'.$topSelectedPosts[2]->image)}}" alt="">
                    </div>
                    <div class="top-post-details">
                        <ul class="tags">
                            <li>
                                <a href="{{route('category',$topSelectedPosts[2]->category_id)}}">{{$topSelectedPosts[2]->category->title}}</a>
                            </li>
                        </ul>
                        <a href="{{route('post',$topSelectedPosts[2])}}">
                            <h4>{{$topSelectedPosts[2]->title}}</h4>
                        </a>
                        <ul class="meta">
                            <li><span class="lnr lnr-user"> {{$topSelectedPosts[2]->user->name}}</span></li>
                            <li><span class="lnr lnr-calendar-full"> {{$topSelectedPosts[2]->published_at}}</span></li>
                            <li><span class="lnr lnr-bubble"> {{$topSelectedPosts[2]->comment_count}}</span></li>
                        </ul>
                    </div>
                </div>
                @endisset
            </div>

            <div class="col-lg-12">
                <div class="news-tracker-wrap">
                    <h6><span>خبر فوری :</span>
                        <a href="">{{$breakingNews->title}}</a></h6>
                </div>
            </div>
        </div>
    </div>
</section>
