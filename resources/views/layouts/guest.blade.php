<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- Vite Assets -->
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="antialiased font-sans bg-gray-100 text-gray-900">

    <main class="min-h-screen flex items-center justify-center px-4 py-8">
        <div class="w-full max-w-md">

            <div class="flex justify-center mb-8">
                <a href="/" class="inline-flex items-center">
                    <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
                </a>
            </div>

            <section class="bg-white rounded-xl shadow-lg p-6">
                {{ $slot }}
            </section>

        </div>
    </main>

</body>
</html>
