<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JB Distribuidora</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/jbicon.ico') }}" />

    <!-- Styles / Scripts -->
    @vite(['resources/js/app.js'])
</head>

<body
    x-data="{
        page: 'comingSoon',
        loaded: true,
        darkMode: JSON.parse(localStorage.getItem('darkMode')) ?? false,
        stickyMenu: false,
        sidebarToggle: false,
        scrollTop: false
    }"
    x-init="
        $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))
    "
    :class="{ 'dark bg-gray-900': darkMode }"
>

    @include('partials.preloader')

    <div class="relative items-center hidden w-full h-full bg-brand-950 dark:bg-white/5 lg:grid">
        <div class="relative flex flex-col justify-center w-full h-screen dark:bg-gray-900 sm:p-0 lg:flex-row">
            {{ $slot }}
        </div>
    </div>

    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
