<x-app.master :categories="$categories">
    <x-slot name="title">News Website</x-slot>
    <div class="site-main-container">
       <x-app.top-posts :topSelectedPosts="$topSelectedPosts"
       :breakingNews="$breakingNews"/>
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">

                        <x-app.latest-posts :latestPosts="$latestPosts"/>
                        <x-app.banner-ads/>

                        <x-app.popular-posts :popularPosts="$popularPosts"/>

                    <!-- sidebar -->
                    </div>
                    </div>
                </div>
        </section>
        <!-- End latest-post Area -->
    </div>


</x-app.master>
