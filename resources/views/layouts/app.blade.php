<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Havenstone Properties') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --color-surface: #fff8f3;
            --color-surface-low: #fff2e2;
            --color-surface-container: #f9ecdc;
            --color-surface-high: #ede1d1;
            --color-primary: #072417;
            --color-primary-container: #1e3a2b;
            --color-secondary: #3a674f;
            --color-secondary-container: #bceecf;
            --color-copy: #424843;
            --color-outline: #8c8275;
            --font-display: "Playfair Display", Georgia, serif;
            --font-body: "Plus Jakarta Sans", Arial, sans-serif;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/site.js') }}" defer></script>
</head>
<body class="min-w-0 bg-surface font-body text-primary antialiased">
    @yield('content')
</body>
</html>
