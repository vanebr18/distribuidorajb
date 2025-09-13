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
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body
    x-data="{ page: 'comingSoon', loaded: true, darkMode: JSON.parse(localStorage.getItem('darkMode')) ?? false, stickyMenu: false, sidebarToggle: false, scrollTop: false }"
    x-init="
        $watch('darkMode', value => {
            localStorage.setItem('darkMode', JSON.stringify(value));
            document.documentElement.classList.toggle('dark', value);
        });
        document.documentElement.classList.toggle('dark', darkMode);
    ">

    @include('partials.preloader')

    <div class="relative p-6 bg-white z-1 dark:bg-gray-900 sm:p-0">
        <div class="relative flex flex-col justify-center w-full h-screen dark:bg-gray-900 sm:p-0 lg:flex-row">
            {{ $slot }}
        </div>
    </div>

    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>