<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">

<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>Кабинет администратора</h2>
            <p class="lead">Добро пожаловать, {{ Session::get('name_user')[0][0]->login }}</p>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3 text-body">Добавление товара</h4>
                <form  action="/office/add" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Наименование товара</label>
                            <input type="text" class="form-control" name="name_product" id="name_product" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Наименование товара является обязательным.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Цена</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" name="price" id="price" placeholder="" value="" required="">
                                <div class="invalid-feedback">
                                    Цена является обязательной.
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group ">
                                <span class="input-group-text">Описание товара</span>
                                <textarea class="form-control" aria-label="Описание товара" name="description" id="description" required=""></textarea>
                                <div class="invalid-feedback">
                                    Поле описания товара является обязательным
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupFile01">Фото</label>
                                <input type="file" class="form-control" name="photo"  id="photo">
                                <div class="invalid-feedback">
                                    Добавьте фото, пожалуйста.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="firstName" class="form-label">Количество товара на складе</label>
                            <input type="text" class="form-control" name="count" id="count" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Количество является обязательным.
                            </div>
                        </div>

                        <div class="col-md-10 offset-md-4">
                        <button class="col-md-4 btn btn-primary btn-sm" name="add" type="submit">Добавить товар</button>
                        </div>
                    </div>
                </form>
                        <hr class="my-4">
                <h4 class="mb-3 text-body">Изменение товара</h4>
                <form action="/office/edit" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="members">Наименование товара</label>
                            <select class="form-select" id="members" name="members">
                                @foreach ($products as $el)
                                    <option value="{{ $el->id_product }}">{{ $el->name_product }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Цена</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" name="price1" id="price1" placeholder="" value="" required="">
                                <div class="invalid-feedback">
                                    Цена является обязательной.
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group ">
                                <span class="input-group-text">Описание товара</span>
                                <textarea class="form-control" aria-label="Описание товара" name="description1" required=""></textarea>
                                <div class="invalid-feedback">
                                    Поле описания товара является обязательным
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupFile01">Фото</label>
                                <input type="file" class="form-control" name="photo1" id="inputGroupFile01">
                                <div class="invalid-feedback">
                                    Добавьте фото, пожалуйста.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="firstName" class="form-label">Количество товара на складе</label>
                            <input type="text" class="form-control" name="count1" id="count" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Количество является обязательным.
                            </div>
                        </div>

                        <div class="col-md-10 offset-md-4">
                            <button class="col-md-4 btn btn-primary btn-sm" name="edit" type="submit">Изменить товар</button>
                        </div>
                    </div>
                </form>
                <hr class="my-4">
                <h4 class="mb-3 text-body">Удаление товара</h4>
                <form action="/office/delete" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Наименование товара</label>
                            <select class="form-select" id="inputGroupSelect01" name="member_delete">
{{--                                <option selected>Выбрать товар...</option>--}}
                                @foreach ($products as $el)
                                    <option value="{{ $el->id_product }}">{{ $el->name_product }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-10 offset-md-4">
                            <button class="col-md-4 btn btn-primary btn-sm" name="delete" type="submit">Удалить товар</button>
                        </div>
                    </div>
                </form>
                <hr class="my-4">
            </div>
        </div>
    </main>

</div>

</body>
