<x-app.master :categories="$categories">

    <x-slot name="title">درباره ما</x-slot>

    <div class="site-main-container">
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <div class="latest-post-wrap">
                            <img class="w-75 p-3" src="{{asset('about-us/img.jpg')}}">
                            <br>
                            <h5>در صورت ارائه پیشنهاد یا ارتباط با ما میتوانید از طریق ایمیل اینکار را انجام دهید</h5>
                            <br>
                            <form>
                                    <input
                                        class="form-control bg-transparent border-top-0 border-end-0
                                        border-start-0 rounded-0 border-muted text-black"
                                        type="text" placeholder="نام سرویس گیرنده">
                                    <br>
                                    <input
                                        class="form-control bg-transparent border-top-0 border-end-0
                                        border-start-0 rounded-0 border-muted text-black"
                                        type="email" placeholder="پست الکترونیکی">
                                    <br>
                                    <textarea
                                        class="form-control bg-transparent border-top-0 border-end-0
                                        border-start-0 rounded-0 border-muted text-black"
                                    ></textarea>
                                    <br>
                                    <input class="btn btn-danger" type="submit" value="ارسال نظر">
                                </form>

                        </div>
                    </div>
                        <x-app.side-bar :mostComments="$mostComments"
                                        :banner="$banner"/>

                    </div>
                </div>
        </section>
    </div>

</x-app.master>
