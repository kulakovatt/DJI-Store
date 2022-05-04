<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DJI Shop</title>
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="font-family: 'Cera Pro'">
<div class="container_custom">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/registration/submit/verify" method="post">
        @csrf
        <div class="form-group">
            <label for="code" class="col-sm-2 col-form-label">Код подтверждения:</label>
            <input type="text" name="code" class="form-control" id="code" placeholder="Введите код">
        </div>

        <button type="submit" class="btn btn-success mt-3 mb-3">Подтвердить</button>
    </form>
</div>
</body>
</html>
