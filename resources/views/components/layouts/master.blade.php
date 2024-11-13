
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$title?? config('app.name')}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('setting/icon.jpg') }}">

    @stack('css')
</head>

<body {{$bodyAttributes??''}} style="font-family: Vazirmatn, sans-serif !important;" >

{{$slot}}

@stack('scripts')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>

</html>
