<x-layouts.master>

    <x-slot name="title">{{$post->title}}</x-slot>
    <x-app.css-loader/>
    <x-app.header-layout :categories="$categories"/>
    <div class="site-main-container">
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <div class="single-post-wrap">
                            <div class="feature-img-thumb relative">
                                <div class="overlay overlay-bg"></div>

                                <img class="img-fluid" src="{{asset('posts/'.$post->image)}}" alt="">

                            </div>
                            <div class="content-wrap">
                                <ul class="tags mt-10">

                                    <li>
                                        <a href="{{route('category',$post->category_id)}}">{{$post->category->title}}</a>
                                    </li>

                                </ul>

                                <h3>{{$post->title}}</h3>

                                <ul class="meta pb-20">

                                    <li><span class="lnr lnr-user"> {{$post->user->name}}</span></li>

                                    <li> {{$post->published_at}}<span class="lnr lnr-calendar-full"></span></li>

                                </ul>

                                <div>

                                    <p>{{$post->summary}}</p>
                                    <hr>
                                    <p>{{$post->body}}</p>

                                </div>

                                <x-app.show-comments :comments="$comments"/>

                            </div>

                            @auth

                                <x-app.submit-comment :post="$post"/>

                            @endauth

                            @guest()
                                <div class="mb-2 alert alert-danger">
                                    <small class="form-text text-black">{{__('main.login_warning')}}</small>
                                </div>
                            @endguest

                        </div>
                    </div>
                        <x-app.side-bar :mostComments="$mostComments"
                                        :banner="$banner"/>

                    </div>
                </div>



        </section>

    </div>
    <x-app.footer-layout/>
    <x-app.scripts-js/>
</x-layouts.master>
