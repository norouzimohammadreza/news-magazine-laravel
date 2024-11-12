@props([
    'comments'
])
@if(!empty($comments))

<div class="comment-sec-area">
    <div class="container">
        <div class="row flex-column">
            <h6>{{__('main.comments')}}</h6>
            <div class="comment-list">
                @foreach($comments as $comment )
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">

                        <div class="desc">
                            <h5>{{$comment->user->name}}</h5>
                            <p class="date mt-3">{{$comment->created_at}}</p>
                            <p class="comment">{{$comment->body}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endif
