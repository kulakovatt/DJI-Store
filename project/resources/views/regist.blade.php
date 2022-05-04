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
<form action="/registration/submit" method="post">
    @csrf
    <div class="form-group">
        <label for="login" class="col-sm-2 col-form-label">Логин:</label>
        <input type="text" name="login" class="form-control" id="login" placeholder="Введите логин">
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 col-form-label">Пароль:</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Введите пароль">
    </div>
    <div class="form-group">
        <input type="password" name="repeat_password" class="form-control mt-2" id="repeat_password" placeholder="Повторите пароль">
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 col-form-label">Email:</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
    </div>

    <button type="submit" class="btn btn-success mt-3 mb-3">Зарегистрироваться</button>
</form>
</div>
</body>
</html>
