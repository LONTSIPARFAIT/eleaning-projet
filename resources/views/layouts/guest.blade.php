<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 dark:text-white antialiased bg-gradient-to-br from-blue-50 to-orange-100 dark:bg-gray-900 min-h-screen">
        <div class="flex flex-col items-center pt-6 sm:pt-12">
            <!-- Logo -->
            <div class="mb-6 scroll-reveal">
                <a href="/" class="flex items-center gap-2">
                    <x-application-logo class="w-16 h-16 fill-current text-red-600" />
                    <span class="text-2xl font-bold text-blue-900 dark:text-white">{{ config('app.name', 'Laravel') }}</span>
                </a>
            </div>

            <!-- Contenu principal -->
            <div class="w-full sm:max-w-md px-6 py-4 scroll-reveal">
                {{ $slot }}
            </div>
        </div>

        <style>
            /* Animations personnalisées */
            @keyframes fadeInUp {
                0% { opacity: 0; transform: translateY(20px); }
                100% { opacity: 1; transform: translateY(0); }
            }
            .scroll-reveal {
                opacity: 0;
                transition: opacity 0.6s ease-out, transform 0.6s ease-out;
            }
            .scroll-reveal.visible {
                animation: fadeInUp 0.6s ease-out forwards;
            }
        </style>

        <script>
            // Animation au scroll
            document.addEventListener('DOMContentLoaded', () => {
                const elements = document.querySelectorAll('.scroll-reveal');
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                        } else {
                            entry.target.classList.remove('visible');
                        }
                    });
                }, { threshold: 0.2 });

                elements.forEach(element => observer.observe(element));
            });
        </script>
    </body>
</html>