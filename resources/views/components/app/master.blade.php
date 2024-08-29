<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Reza Norouzi">
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <x-app.css-loader/>
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
                    @foreach($categories as $category)
                        <li class="menu-active">
                            <a href="{{route('category',$category)}}">{{$category->title}}</a>
                        </li>
                    @endforeach
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
