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

    @yield('content')

    @if(Request::is('/'))
        @include('main')
    @endif

    @if (session('status'))
        <script>
            alert('{{ session('status') }}');
        </script>
    @endif
{{--    @if(Request::is('/catalog'))--}}
{{--        @include('header')--}}
{{--    @endif--}}

{{--    @yield('products')--}}

</body>
</html>
