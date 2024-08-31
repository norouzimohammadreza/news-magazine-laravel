<div class="latest-post-wrap">
    <h4 class="cat-title">آخرین اخبار</h4>
@foreach($latestPosts as $post)
    <div class="single-latest-post row align-items-center">
        <div class="col-lg-5 post-left">
            <div class="feature-img relative">
                <div class="overlay overlay-bg"></div>
                <img class="img-fluid" src="{{asset('posts/'.$post->image)}}" alt="">
            </div>
            <ul class="tags">
                <li><a href="{{route('category',$post->category_id)}}">{{$post->category->title}}</a></li>
            </ul>
        </div>
        <div class="col-lg-7 post-right">
            <a href="">
                <h4>{{$post->title}}</h4>
            </a>
            <ul class="meta">
                <li><span class="lnr lnr-user">{{$post->user->name}}</span></li>
                <li><span class="lnr lnr-calendar-full">{{$post->published_at}}</span></li>
                <li><span class="lnr lnr-bubble">{{$post->comments}}</span></li>
            </ul>
            <p class="excert">{{substr($post->summary,0,150)}}</p>
        </div>
    </div>
    @endforeach
</div>
