<div class="row">
    <div class="col-lg-6 col-md-6 single-footer-widget">
        <h4>{{__('main.popular_news')}}</h4>
        <ul>
            <li><a href="#">{{__('main.news_title')}}</a></li>
            @dd(session()->has('lang'))
        </ul>
    </div>
    <div class="col-lg-6 col-md-6 single-footer-widget">
        <h4>{{__('main.Related_to_us')}}</h4>
        <ul>
            <li><a href="#">{{__('main.about_us')}}</a></li>
            <li><a href="#">{{__('main.contact_us')}}</a></li>
            <li><a href="#">{{__('main.faq')}}</a></li>
        </ul>
    </div>
</div>
