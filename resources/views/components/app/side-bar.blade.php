</div>
<div class="col-lg-4">
    <div class="sidebars-area">
        <!-- ads -->
        <div class="single-sidebar-widget">
            <img class="img-fluid" src="{{asset('banners/'. $banner->image)}}" alt="">
        </div>
        <!-- end ads -->
        <div class="single-sidebar-widget most-popular-widget">
            <h6 class="title">{{__('main.the_most_controversial')}}</h6>
            @foreach($mostComments as $post)
            <div class="single-list flex-row d-flex">
                <div class="thumb">
                    <img class="img-fluid" src="{{asset('posts/'.$post->image)}}" width="120px" height="85px" alt="">
                </div>
                <div class="details">
                    <a href="{{route('post',$post)}}">
                        <h6>{{$post->title}}</h6>
                    </a>
                    <ul class="meta">
                        <li><span class="lnr lnr-calendar-full"> {{$post->published_at}}</span></li>
                        <li><span class="lnr lnr-bubble"> {{$post->approved_comments_count}}</span></li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
