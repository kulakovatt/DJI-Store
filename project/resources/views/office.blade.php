<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('images/iconfinder.ico') }}" type="image/x-icon">
    <title>DJI Shop</title>
    <link rel="stylesheet" href="../../css/app.css">
    {{--    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">--}}
    {{--    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body style="font-family: 'Cera Pro'">

    @if($data == "1")
        @include('adminOffice')
    @elseif($data == "0")
        @include('userOffice')
    @endif



</body>
</html>
