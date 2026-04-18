<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'HOSTZERA - Premium Hosting')</title>
    <meta name="description" content="@yield('meta_description', 'Premium hosting for professionals. Fast, secure and reliable hosting solutions.')">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Main Stylesheet --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')
</head>
<body>
    @include('components.navbar')

    @yield('content')

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; {{ date('Y') }} HOSTZERA. All rights reserved.</p>
        </div>
    </footer>

    @stack('scripts')

    {{-- Lucide Icons Init --}}
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
