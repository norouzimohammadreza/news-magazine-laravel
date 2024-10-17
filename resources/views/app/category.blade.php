<x-app.master :categories="$categories">

    <x-slot name="title">{{$category}}</x-slot>

    <div class="site-main-container">
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <div class="latest-post-wrap">
                            <h4 class="cat-title">آخرین اخبار</h4>

                            <x-app.posts-category :posts="$posts"/>

                            @if(empty($posts->all()))

                                <div class="single-latest-post row align-items-center">
                                    <div class="col-lg-5 post-left">
                                        <p>پستی در این دسته بندی وجود ندارد.</p>
                                    </div>
                                </div>

                            @endif

                        </div>

                        <x-app.banner-ads :banner="$banner"/>

                        <x-app.side-bar :mostComments="$mostComments"
                                        :banner="$banner"/>

                    </div>
                </div>
            </div>
        </section>
    </div>

</x-app.master>
