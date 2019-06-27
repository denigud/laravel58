<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <script src="{{ asset('js/vue-router.js') }}"></script>
{{--    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>--}}


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">

        <a class="btn btn-primary" href="{{ route('shop.admin.categories.index') }}" role="button">Категории</a>
        <a class="btn btn-primary" href="{{ route('shop.admin.items.index') }}" role="button">Товары</a>

        <a class="btn btn-primary" href="{{ route('shop.items.index') }}" role="button">Каталог товаров</a>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
