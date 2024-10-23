<div class="popular-post-wrap">
    <h4 class="title">{{__('main.popular_news')}}</h4>
    @foreach($popularPosts as $post)
    <div class="feature-post relative">
        <div class="feature-img relative mb-10">
            <div class="overlay overlay-bg"></div>
            <img class="img-fluid" src="{{asset('posts/'.$post->image)}}" alt="">
        </div>
        <div class="details">
            <ul class="tags">
                <li><a href="{{route('category',$post->category_id)}}">{{$post->category->title}}</a></li>
            </ul>
            <a href="{{route('post',$post)}}">
                <h3>{{$post->title}}</h3>
            </a>
            <ul class="meta">
                <li><span class="lnr lnr-user"> {{$post->user->name}}</span></li>
                <li><span class="lnr lnr-calendar-full"> {{$post->published_at}}</span></li>
                <li><span class="lnr lnr-eye"> {{$post->view}}</span></li>
            </ul>
        </div>
    </div>
    @endforeach
</div>
