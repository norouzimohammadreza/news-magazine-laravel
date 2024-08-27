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
