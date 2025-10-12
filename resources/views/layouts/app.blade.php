<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JB Distribuidora</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/jbicon.ico') }}" />
    @vite(['resources/js/app.js'])
</head>

<body
    x-data="{
        page: '{{ $page ?? 'dashboard' }}',
        'loaded': true, 
        'darkMode': false,
        'stickyMenu': false,
        'sidebarToggle': false,
        'scrollTop': false,
        pages: {
            dashboard: 'dashboard',
            mantenimiento: ['tipo-gases', 'zonas', 'clientes', 'proveedores', 'tubos'],
            calendar: 'calendar',
        },

        isInGroup(groupPages) {
            if (Array.isArray(groupPages)) {
                return groupPages.includes(this.page);
            }
            return groupPages === this.page;
        }
    }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}">

    @include('partials.preloader')

    <div class="flex h-screen overflow-hidden">

        @include('partials.sidebar')

        <div
            class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            @include('partials.overlay')

            @include('partials.header')

            <!-- Main content -->
            <main>
                <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
                    {{ $slot ?? '' }}
                </div>
            </main>
        </div>
    </div>
</body>

</html>