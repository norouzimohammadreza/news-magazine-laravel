<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Reza Norouzi">
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('setting/icon.jpg') }}">
    <x-app.css-loader/>
    @if(session('lang')=='fa')
        <x-change-local-font/>
    @endif
</head>

<body>
<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <x-app.social-medias/>
                <x-app.check-auth/>
            </div>
        </div>
    </div>
    <x-app.header-distance/>
    <div class="container main-menu" id="main-menu">
        <div class="row align-items-center justify-content-between">
            <nav id="nav-menu-container">
                <ul class="nav-menu">

                <x-app.categories :categories="$categories"/>
                </ul>
            </nav>
            <x-app.header/>
        </div>
    </div>
</header>

{{$slot}}

<footer class="footer-area section-gap">
    <div class="container">
        <x-app.footer-links/>
        <div class="footer-bottom row align-items-center">
            <p class="footer-text m-0 col-lg-8 col-md-12">
                .Copyright &copy; | This Template used for test
            </p>
        </div>
    </div>
</footer>

<x-app.scripts-js/>
</body>

</html>
