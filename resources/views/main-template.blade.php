<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - {{ config('app.name') }}</title>

    <link href="/favicon.ico" rel="icon" type="image/png" sizes="16x16">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('head')
</head>

<body>
    <div class="page">
        @include('layouts.header')

        <main class="main">
            @yield('content')
        </main>
        
        @include('layouts.footer')
    </div>

    @yield('scripts')
</body>
</html>