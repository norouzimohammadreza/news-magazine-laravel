<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('setting/icon.jpg') }}">
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css"/>
    <title>{{$title}}</title>
    <x-change-local-font/>
    <x-admin.layout.css-loader/>
    @stack('CkEditorCss')
</head>

<body style="font-family: Vazirmatn, sans-serif !important;">
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<x-admin.layout.header/>
<div class="container-fluid">
    <div class="row">
        <x-admin.layout.sidebar/>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            {{$slot}}
        </main>
    </div>
</div>
<x-admin.layout.scripts/>
@stack('ckEditorJs')
</body>
