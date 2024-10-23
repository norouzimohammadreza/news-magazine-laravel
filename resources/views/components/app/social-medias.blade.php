<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
    <ul>
        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        <li><a href="#"><i class="fa fa-telegram"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a href="#"><i class="fa fa-github ml-3"></i></a></li>


        <li class="p-1 rounded rounded-2 bg-secondary">
            <i class="fa fa-language text-white mx-1"></i>
            @if(session('lang')=='fa')
                <a href="{{route('change-lang','en')}}" class="font-weight-bold text-capitalize mx-1"
                   style="font-size: 14px">
                    en
                </a>
            @else
                <a href="{{route('change-lang','fa')}}" class="font-weight-bold text-capitalize mx-1"
                   style="font-size: 14px">
                    fa
                </a>
        </li>
        @endif


    </ul>
</div>
