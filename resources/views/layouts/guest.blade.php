<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Simple ERP') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-gray-100">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md">
            <!-- Header / Branding -->
            <div class="mb-6 text-left">
                <h1 class="text-2xl font-bold text-gray-800">
                    {{ config('app.name', 'Simple ERP') }}
                </h1>
                <p class="text-sm text-gray-500">by Sultan Faaiz</p>
            </div>

            <!-- Main Card -->
            <div class="bg-white shadow-md rounded-lg p-6">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>