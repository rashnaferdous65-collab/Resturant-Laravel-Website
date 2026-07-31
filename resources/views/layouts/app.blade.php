```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet"
        href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">

    <!-- Vite Assets -->
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="antialiased font-sans">

    <div class="bg-gray-100 min-h-screen">

        {{-- Navigation --}}
        @include('layouts.navigation')

        {{-- Header Section --}}
        @isset($header)
            <header class="shadow bg-white">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- Main Content --}}
        <main class="w-full">
            {{ $slot }}
        </main>

    </div>

</body>

</html>
```

