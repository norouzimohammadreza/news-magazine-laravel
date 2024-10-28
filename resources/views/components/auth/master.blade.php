<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$title}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?= asset('/auth/assets/images/icons/favicon.ico');?>"/>
    <link rel="stylesheet" type="text/css" href="<?= asset('/auth/assets/vendor/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css"
          href="{{asset('/auth/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="<?= asset('/auth/assets/vendor/animate/animate.css');?>">
    <link rel="stylesheet" type="text/css" href="<?= asset('/auth/assets/vendor/css-hamburgers/hamburgers.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?= asset('/auth/assets/vendor/select2/select2.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?= asset('/auth/assets/css/util.css');?>">
    <link rel="stylesheet" type="text/css" href="<?= asset('/auth/assets/css/main.css');?>">
    @if(session('lang')=='fa')
        <x-change-local-font/>
    @endif
</head>

<body>
<div class="bg-primary">
    <x-change-language-button/>
</div>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?= asset('/auth/assets/images/img-01.png');?>" alt="IMG">
            </div>
            {{$slot}}

        </div>
    </div>
</div>


<script src="<?= asset('/auth/assets/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
<script src="<?= asset('/auth/assets/vendor/bootstrap/js/popper.js') ?>"></script>
<script src="<?= asset('/auth/assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= asset('/auth/assets/vendor/select2/select2.min.js') ?>"></script>
<script src="<?= asset('/auth/assets/vendor/tilt/tilt.jquery.min.js') ?>"></script>
<script src="<?= asset('/auth/assets/js/main.js') ?>"></script>

</body>

</html>
