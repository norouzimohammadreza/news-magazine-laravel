@foreach($posts as $post)
    <div class="single-latest-post row align-items-center">
        <div class="col-lg-5 post-left">
            <div class="feature-img relative">
                <div class="overlay overlay-bg"></div>
                <img class="img-fluid" src="{{asset('posts/'.$post->image)}}" alt="">
            </div>
        </div>
        <div class="col-lg-7 post-right">
            <a href="{{route('post',$post)}}">
                <h4>{{$post->title}}</h4>
            </a>
            <ul class="meta">
                <li><span class="lnr lnr-user"> {{$post->user->name}}</span></li>
                <li><span class="lnr lnr-calendar-full"> {{$post->published_at}}</span></li>
                <li><span class="lnr lnr-bubble"> {{$post->comments}}</span></li>
            </ul>
            <p class="excert">{{substr($post->summary,0,120)}}</p>
        </div>
    </div>
@endforeach
