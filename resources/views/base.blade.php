<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ trim($__env->yieldContent('title')) ? trim($__env->yieldContent('title')) . ' - ' : '' }}Admin NxHost
    </title>

    <link rel="shortcut icon" href="/asset/img/logo.png" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('partials.header')

    @yield('body')

    @include('partials.footer')
</body>
</html>