<section class="latest-post-area pb-120">
    <div class="container no-padding">
        <div class="row">
            <div class="col-lg-8 post-list">
                <!-- Start latest-post Area -->
                <div class="latest-post-wrap">
                    <h4 class="cat-title">آخرین اخبار</h4>
                    <?php foreach ($lastPosts as $lastP) { ?>
                    <div class="single-latest-post row align-items-center">
                        <div class="col-lg-5 post-left">
                            <div class="feature-img relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="<?= asset($lastP['image']); ?>" alt="">
                            </div>
                            <ul class="tags">
                                <li><a href="<?= url('category'.'/'.$lastP['cat_id']) ?>"><?= $lastP['cat_title']  ?></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-7 post-right">
                            <a href="<?= url('post'.'/'.$lastP['id']) ?>">
                                <h4><?= $lastP['title']  ?></h4>
                            </a>
                            <ul class="meta">
                                <li><a href="<?= url('post'.'/'.$lastP['id']) ?>"><span class="lnr lnr-user"></span><?= $lastP['username']  ?></a></li>
                                <li><a href="<?= url('post'.'/'.$lastP['id']) ?>"><?= $lastP['created_time']  ?><span class="lnr lnr-calendar-full"></span></a></li>
                                <li><a href="<?= url('post'.'/'.$lastP['id']) ?>"> <?= $lastP['comment_count']  ?><span class="lnr lnr-bubble"></span></a></li>
                            </ul>
                            <p class="excert"><?= $lastP['summary']  ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <!-- End latest-post Area -->

                <!-- Start banner-ads Area -->
                <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                    <img class="img-fluid" src="<?=  $bodyBanner['image']?>" alt="">
                </div>
                <!-- End banner-ads Area -->
                <!-- Start popular-post Area -->
                <div class="popular-post-wrap">
                    <h4 class="title">اخبار پربازدید</h4>
                    <div class="feature-post relative">
                        <?php if($mostViewPost[0]){ ?>
                        <div class="feature-img relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="<?= $mostViewPost[0]['image'] ?>" alt="">
                        </div>
                        <div class="details">
                            <ul class="tags">
                                <li><a href="<?= url('category'.'/'.$mostViewPost[0]['cat_id']) ?>"><?= $mostViewPost[0]['cat_title'] ?></a></li>
                            </ul>
                            <a href="<?= url('post'.'/'.$mostViewPost[0]['id']) ?>">
                                <h3><?= $mostViewPost[0]['title'] ?></h3>
                            </a>
                            <ul class="meta">
                                <li><a href="<?= url('post'.'/'.$mostViewPost[0]['id']) ?>"><span class="lnr lnr-user"></span><?= $mostViewPost[0]['username'] ?></a></li>
                                <li><a href="<?= url('post'.'/'.$mostViewPost[0]['id']) ?>"><?= $mostViewPost[0]['created_time'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                <li><a href="<?= url('post'.'/'.$mostViewPost[0]['id']) ?>"><?= $mostViewPost[0]['view'] ?><span class="lnr lnr-bubble"></span></a></li>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row mt-20 medium-gutters">
                        <div class="col-lg-6 single-popular-post">

                            <?php if($mostViewPost[1]){ ?>
                            <div class="feature-img-wrap relative">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="<?= $mostViewPost[1]['image'] ?>" alt="">
                                </div>
                                <ul class="tags">
                                    <li><a href="<?= url('category'.'/'.$mostViewPost[1]['cat_id']) ?>"><?= $mostViewPost[1]['cat_title'] ?></a></li>
                                </ul>
                            </div>
                            <div class="details">
                                <a href="<?= url('post'.'/'.$mostViewPost[1]['id']) ?>">
                                    <h4><?= $mostViewPost[1]['title'] ?></h4>
                                </a>
                                <ul class="meta">
                                    <li><a href="<?= url('post'.'/'.$mostViewPost[1]['id']) ?>"><span class="lnr lnr-user"></span><?= $mostViewPost[1]['username'] ?></a></li>
                                    <li><a href="<?= url('post'.'/'.$mostViewPost[1]['id']) ?>"><?= $mostViewPost[1]['created_time'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="<?= url('post'.'/'.$mostViewPost[1]['id']) ?>"> <?= $mostViewPost[1]['view'] ?><span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                                <p class="excert"><?= substr($mostViewPost[1]['summary'],0,150)  ?></p>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-lg-6 single-popular-post">
                            <?php if($mostViewPost[2]){ ?>
                            <div class="feature-img-wrap relative">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="<?= $mostViewPost[2]['image'] ?>" alt="">
                                </div>
                                <ul class="tags">
                                    <li><a href="<?= url('category'.'/'.$mostViewPost[2]['cat_id']) ?>"><?= $mostViewPost[2]['cat_title'] ?></a></li>
                                </ul>
                            </div>
                            <div class="details">
                                <a href="<?= url('post'.'/'.$mostViewPost[2]['id']) ?>">
                                    <h4><?= $mostViewPost[2]['title'] ?></h4>
                                </a>
                                <ul class="meta">
                                    <li><a href="<?= url('post'.'/'.$mostViewPost[2]['id']) ?>"><span class="lnr lnr-user"></span><?= $mostViewPost[2]['username'] ?></a></li>
                                    <li><a href="<?= url('post'.'/'.$mostViewPost[2]['id']) ?>"><?= $mostViewPost[2]['created_time'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="<?= url('post'.'/'.$mostViewPost[2]['id']) ?>"><?= $mostViewPost[2]['view'] ?><span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                                <p class="excert"><?= substr($mostViewPost[2]['summary'],0,150)  ?></p>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- End popular-post Area -->
                <?php
                require_once (BASE_PATH .'/template/app/layout/sidebar.php');
                ?>
            </div>
        </div>
</section>
