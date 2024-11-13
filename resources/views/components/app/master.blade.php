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


{{$slot}}



<x-app.scripts-js/>
</body>

</html>
