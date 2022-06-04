<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-light">

<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>Личный кабинет</h2>
            <?php
            if (gettype(Session::get('name_user')[0]) == 'string'){
                echo ' <p class="lead">Добро пожаловать, '.Session::get('name_user')[0].'</p>';
            } else if (gettype(Session::get('name_user')[0]) == 'object'){
                echo ' <p class="lead">Добро пожаловать, '.Session::get('name_user')[0][0]->login.'</p>';
            }
            ?>
        </div>

        <section class="h-100 h-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-8">
                                        <div class="p-5" id="basketAll">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h3 class=" mb-0 mt-2 pt-1">Корзина</h3>
                                            </div>
                                            <hr class="my-4">
                                            @foreach($basket_all as $el)
                                            <div class="row mb-4 d-flex justify-content-between align-items-center item">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img
                                                        src="{{ asset($el->photo) }}"
                                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
{{--                                                    <h6 class="text-muted">{{ $el->name_product }}</h6>--}}
                                                    <h6 class="text-black mb-0">{{ $el->name_product }}</h6>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                    <button class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                    <input id="form1" disabled  name="quantity" value="{{ $el->count }}" type="number"
                                                           class="form-control form-control-sm" />

                                                    <button class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0">$ {{ $el->price * $el->count}}</h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    @csrf
                                                    <button class="text-muted bg-transparent border-0 delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                        </svg></button>
                                                </div>
                                            </div>
                                            @endforeach
                                            <hr class="my-4">

                                            <div class="pt-5">
                                                <h6 class="mb-0"><a href="/catalog" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i>Вернуться в каталог</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 bg-grey">
                                        <div class="p-5">
                                            <h3 class=" mb-5 mt-2 pt-1">Оформление заказа</h3>
                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase">Всего товаров: {{ count($basket_all) }}</h5>
                                            </div>

                                            <h5 class="text-uppercase mb-3">Оплата</h5>

                                            <div class="mb-4 pb-2">
                                                <select class="select pay" >
                                                    <option value="наличными">Наличными</option>
                                                    <option value="картой">Картой</option>
                                                </select>
                                            </div>

                                            <h5 class="text-uppercase mb-3">Адрес доставки</h5>

                                            <div class="mb-5">
                                                <div class="form-outline">
                                                    <input type="text"  class="form-control form-control-lg address" />
                                                    <label class="form-label" for="form3Examplea2">Введите адрес</label>
                                                </div>
                                            </div>

                                            <h5 class="text-uppercase mb-3">Контактный телефон</h5>

                                            <div class="mb-5">
                                                <div class="form-outline">
                                                    <input type="text"  class="form-control form-control-lg telephone" />
                                                    <label class="form-label" for="form3Examplea2">Введите номер телефона</label>
                                                </div>
                                            </div>

                                            <h5 class="text-uppercase mb-3">Дата доставки</h5>

                                            <div class="mb-5">
                                                <div class="form-outline">
                                                    <input type="text"  class="form-control form-control-lg date_order" />
                                                    <label class="form-label" for="form3Examplea2">Введите дату в формате 01.01.2022</label>
                                                </div>
                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-5">
                                                <h5 class="text-uppercase">Итоговая сумма</h5>

                                                <h5 class="summary_order">$ @php
                                                        $sum = 0;
                                                        foreach ($basket_all as $el){
                                                            $sum += ($el->price * $el->count);
                                                        }
                                                        echo $sum;
                                                    @endphp </h5>
                                            </div>

                                            <button type="button" class="btn btn-dark btn-block btn-lg order_butt"
                                                    data-mdb-ripple-color="dark">Заказать</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="h-100 h-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-8">
                                        <div class="p-5" id="basketAll">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h3 class=" mb-0 mt-2 pt-1">Избранное</h3>
                                            </div>
                                            <hr class="my-4">
                                            @foreach($favorite_user as $el)
                                                <div class="row mb-4 d-flex justify-content-between align-items-center item">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img
                                                            src="{{ asset($el->photo) }}"
                                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        {{--                                                    <h6 class="text-muted">{{ $el->name_product }}</h6>--}}
                                                        <h6 class="text-black mb-0">{{ $el->name_product }}</h6>
                                                    </div>

                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                        @csrf
                                                        <button class="text-muted bg-transparent border-0 delete-favor"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                            </svg></button>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <hr class="my-4">

                                            <div class="pt-5">
                                                <h6 class="mb-0"><a href="/catalog" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i>Вернуться в каталог</a></h6>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="h-100 h-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-8">
                                        <div class="p-5" id="basketAll">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h3 class=" mb-0 mt-2 pt-1">Заказы</h3>
                                            </div>
                                            <hr class="my-4">
                                            @foreach($order_all as $el)
                                                <div class="row mb-4 d-flex align-items-center item">
                                                    <div class="row-cols-2">
                                                        <div class="row row-cols-auto">
                                                        <h6 class="text-black mb-0 col">Заказ №{{ $el->id_order }}</h6>

                                                        <h6 class="text-black mb-0 col">На сумму: ${{ $el->sum_price }}</h6>

                                                        <p class="text-black mb-0 col">Оплата: {{ $el->payment }}</p>

                                                        <p class="text-black mb-0 col">Адрес доставки: {{ $el->address }}</p>

                                                        <p class="text-black mb-0 col">Дата доставки: {{ $el->date_order }}</p>

                                                        <p class="text-black mb-0 col">Контактный телефон: {{ $el->phone }}</p>
                                                        </div>
                                                    </div>

{{--                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">--}}
{{--                                                        @csrf--}}
{{--                                                        <button class="text-muted bg-transparent border-0 delete-favor"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">--}}
{{--                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>--}}
{{--                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>--}}
{{--                                                            </svg></button>--}}
{{--                                                    </div>--}}
                                                </div>
                                            @endforeach
                                            <hr class="my-4">

                                            <div class="pt-5">
                                                <h6 class="mb-0"><a href="/catalog" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i>Вернуться в каталог</a></h6>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>
<script>
    let div = document.getElementsByClassName("item");

    for(let i = 0; i < div.length; i++){
        div[i].setAttribute("id", "_" + i);
    }


    $(function() {

        $('.delete').on('click',function(){

            var messages = $(this).closest('.item')[0].innerText;
            // console.log(messages);
            $(this).closest('.item').remove();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url: '{{ route('DeleteBasket') }}',

                type: "POST",

                data: {info: messages, "_token": $('meta[name="csrf-token"]').attr('content')},

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success:function(response) {

                },

                // error: function (msg) {
                //
                //     alert('Ошибка');
                //
                // }

            });

        });

        $('.delete-favor').on('click',function(){

            var messages = $(this).closest('.item')[0].innerText;
            // console.log(messages);
            $(this).closest('.item').remove();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url: '{{ route('DeleteFavor') }}',

                type: "POST",

                data: {info: messages, "_token": $('meta[name="csrf-token"]').attr('content')},

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success:function(response) {
                    // console.log(response);

                },

                // error: function (msg) {
                //
                //     alert('Ошибка');
                //
                // }

            });

        });

        $('.order_butt').on('click',function(){

            var pay = $('.pay')[0].value;
            var address = $('.address')[0].value;
            var phone = $('.telephone')[0].value;
            var date = $('.date_order')[0].value;
            var sum = $('.summary_order')[0].innerText.slice(2);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url: '{{ route('AddOrder') }}',

                type: "POST",

                data: {pay: pay, address: address, phone: phone, date: date, sum: sum, "_token": $('meta[name="csrf-token"]').attr('content')},

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success:function(response) {
                    // $('body').html(response);
                    // console.log(response);

                },

                // error: function (msg) {
                //
                //     alert('Ошибка');
                //
                // }

            });

        });

    })

</script>
</body>
