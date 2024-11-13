<x-layouts.master>
    <x-slot name="title">{{$category}}</x-slot>
    <x-app.css-loader/>
    <x-app.header-layout :categories="$categories"/>
    <div class="site-main-container">
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <div class="latest-post-wrap">
                            <h4 class="cat-title">{{__('main.latest_news')}}</h4>

                            <x-app.posts-category :posts="$posts"/>

                            @if(empty($posts->all()))

                                <div class="single-latest-post row align-items-center">
                                    <div class="col-lg-5 post-left">
                                        <p>{{__('main.empty_post')}}</p>
                                    </div>
                                </div>

                            @endif

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
