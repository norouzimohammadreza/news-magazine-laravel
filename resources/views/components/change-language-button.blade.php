<div class="bg-primary">
    <i class="fa fa-language text-white mx-1"></i>
    @if(session('lang')=='en')
        <a href="?lang=fa" class="font-weight-bold text-capitalize mx-1"
           style="font-size: 14px">
            fa
        </a>
    @else
        <a href="?lang=en" class="font-weight-bold text-capitalize mx-1"
           style="font-size: 14px">
            en
        </a>
    @endif
</div>
