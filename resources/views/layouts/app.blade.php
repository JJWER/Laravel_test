<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'ระบบ HR')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])  
</head>
<body>
    <div class="min-vh-100 d-flex flex-column">
        @include('layouts.navigation')

        <main class="flex-grow-1">
            @yield('content')
        </main>

        <footer class="bg-dark text-white text-center py-3 mt-auto">
            <p class="mb-0">© 2024 ระบบ HR | พัฒนาโดยนาย ธนาธิป เตชะ </p>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
