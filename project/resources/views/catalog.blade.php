@extends('layouts.app')

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" height="10.867mm" width="30.505mm" version="1.1"  viewBox="0 0 164.781 95.198662">
                    <g transform="translate(-57.626 -906.13)">
                        <g fill="#0971ce" transform="matrix(.54927 0 0 .54927 -45.604 584.42)">
                            <g transform="matrix(7.1169 0 0 -7.1169 407.57 711.56)">
                                <path d="m0 0 3.11 12.918h-6.676l-2.845-11.586c-0.413-2.258-2.84-3.315-4.563-3.342h-4.731l-1.605-4.657h9.941c2.452 0 6.074 1.255 7.369 6.667" fill="#ffffff"/>
                            </g>
                            <g transform="matrix(7.1169 0 0 -7.1169 307.84 679.14)">
                                <path d="m0 0 3.138 13.131h6.87l-3.571-14.936c-0.687-2.884-2.831-3.577-4.811-3.577h-15.837c-1.745 0-3.207 0.742-2.415 4.072l1.426 5.958c0.723 3.021 2.97 3.712 4.595 3.712h11.053l-0.89-3.723h-5.643c-0.83 0-1.285-0.18-1.517-1.149l-0.91-3.803c-0.326-1.365 0.151-1.46 1.152-1.46h5.17c0.947 0 1.779 0.06 2.19 1.775" fill="#ffffff"/>
                            </g>
                            <g transform="matrix(7.1169 0 0 -7.1169 440.44 619.63)">
                                <path d="m0 0-3.234-13.745h6.675l3.233 13.745h-6.674z" fill="#ffffff"/>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 text-white">Главная</a></li>
                <li><a href="/catalog" class="nav-link px-2 text-secondary">Каталог</a></li>
                <li><a href="/office" class="nav-link px-2 text-white">Личный кабинет</a></li>
            </ul>

            <div class="text-end">
                <button type="button" class="btn btn-outline-light me-2" onClick='location.href="http://localhost:8000/autorization"'>Войти</button>
                <button type="button" class="btn btn-primary" onClick='location.href="http://localhost:8000/registration"'>Регистрация</button>
            </div>
        </div>
    </div>
</header>

    <div class="mt-4  container">
        <div class="row">
        <div class="col">
                <input type="search" class="form-control form-control-dark search_input" placeholder="Поиск..." aria-label="Search">
                <div class="text-right">
                    @csrf
                <button class="btn btn-primary search_butt mt-2">Найти</button></div>
        </div>
        <div class="col">
                <select class="form-select sort_elem" aria-label="Сортировка" >
                    <option disabled selected>Сортировка по:</option>
                    <option value="asc">возрастанию цены</option>
                    <option value="desc">убыванию цены</option>
                </select>
                <div class="text-right">
                    @csrf
                    <button class="btn btn-primary sort_butt mt-2">Сортировать</button></div>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="filt" id="inlineRadio1" value="Mavic">
                <label class="form-check-label" for="inlineRadio1">Mavic</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="filt" id="inlineRadio2" value="Air">
                <label class="form-check-label" for="inlineRadio2">Air</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="filt" id="inlineRadio2" value="Mini">
                <label class="form-check-label" for="inlineRadio2">Mini</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="filt" id="inlineRadio2" value="FPV">
                <label class="form-check-label" for="inlineRadio2">FPV</label>
            </div>
            <div class="text-right">
                @csrf
                <button class="btn btn-primary filter_butt mt-2">Фильтровать</button></div>
        </div>
        </div>
    </div>

    <div class="album py-5 mt-4 bg-light h-100">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach ($data as $el)
                <div class="col">
                    <div class="card shadow-sm">
                        <img  src="{{ asset($el->photo) }}"></img>
                        <div class="card-body">
                            <p class="fw-bold">{{ $el->name_product }}</p>
                            <p>{{ $el->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">

{{--     TODO: при нажатии на кнопку корзины срабатывает функция, в которой проверяются условия 1)если товара нет в таблице baskets, то добавляем с count=1; 2) если есть товар, то увеличиваем на 1 пока не достигнет максимума; 3) если достигнет максимума алертнуть об этом --}}
                                    @csrf
                                    <button type="button" class="btn btn-outline-secondary add_favorite">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                            <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                                        </svg>
                                    </button>
{{--                                    <form action="/catalog/basket" method="post">--}}
                                    @csrf
                                    <button type="submit" class="btn btn-outline-secondary add_basket">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"></path>
                                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
                                        </svg>
                                    </button>
{{--                                    </form>--}}
                                </div>
                                <p class="fw-normal m-0">${{ $el->price }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

<script>
    let div = document.getElementsByClassName("col");

    for(let i = 0; i < div.length; i++){
        div[i].setAttribute("id", "_" + i);
    }


    $(function() {

        $('.add_basket').on('click',function(){

            var messages = $(this).closest('.col')[0].innerText;
            // console.log(messages);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url: '{{ route('addBasket') }}',

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

        $('.add_favorite').on('click',function(){

            var messages = $(this).closest('.col')[0].innerText;
            // console.log(messages);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url: '{{ route('AddFavorite') }}',

                type: "POST",

                data: {info: messages, "_token": $('meta[name="csrf-token"]').attr('content')},

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success:function(response) {
                    console.log(response);
                },

                // error: function (msg) {
                //
                //     alert('Ошибка');
                //
                // }

            });

        });

        $('.search_butt').on('click',function(){

            var messages = $('.search_input')[0].value;
            // console.log(messages);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url: '{{ route('Search') }}',

                type: "POST",

                data: {info: messages, "_token": $('meta[name="csrf-token"]').attr('content')},

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success:function(response) {
                    $('body').html(response);
            },

                // error: function (msg) {
                //
                //     alert('Ошибка');
                //
                // }

            });

        });

        $('.sort_butt').on('click',function(){

            var messages = $('.sort_elem')[0].value;
            // console.log(messages);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url: '{{ route('Sort') }}',

                type: "POST",

                data: {info: messages, "_token": $('meta[name="csrf-token"]').attr('content')},

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success:function(response) {
                    $('body').html(response);
                },

                // error: function (msg) {
                //
                //     alert('Ошибка');
                //
                // }

            });

        });

        $('.filter_butt').on('click',function(){

            var messages = $('input[name=filt]:checked').val();
            // console.log(messages);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url: '{{ route('Filter') }}',

                type: "POST",

                data: {info: messages, "_token": $('meta[name="csrf-token"]').attr('content')},

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success:function(response) {
                    $('body').html(response);
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
