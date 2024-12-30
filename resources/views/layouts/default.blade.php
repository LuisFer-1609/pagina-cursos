<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title_page')</title>
    @yield('style_head')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen w-full flex flex-col">

    <x-header></x-header>
    <div class="flex-1 flex flex-col">
        @yield('main')
    </div>
    @yield('footer')
    @yield('scripts')

</body>

</html>
