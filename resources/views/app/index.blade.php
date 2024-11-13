<x-layouts.master>
    <x-slot name="title">{{__('main.home_title')}}</x-slot>
    <x-app.css-loader/>
    <x-app.header-layout :categories="$categories"/>
    <div class="site-main-container">
        <x-app.top-posts :topSelectedPosts="$topSelectedPosts"
                         :breakingNews="$breakingNews"/>

        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">

                        <x-app.latest-posts :latestPosts="$latestPosts"/>

                        <x-app.popular-posts :popularPosts="$popularPosts"/>
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
