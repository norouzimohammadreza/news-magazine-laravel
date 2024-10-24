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
@endif
