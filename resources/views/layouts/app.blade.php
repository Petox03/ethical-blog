<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog académico sobre Ética Profesional y Ciudadanía — Módulo 3, Tecmilenio">
    <title>@yield('title', 'EPyC · Módulo 3') — Alberto Ramón Sosa</title>

    {{--
        Tailwind CSS via CDN.
        Para producción real: instalar via npm y compilar con Vite.
        Para este proyecto académico, el CDN es suficiente.
    --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{--
        Google Fonts: Playfair Display (serif elegante para titulares)
        + Source Serif 4 (serif legible para cuerpo de texto).
        Coincide con el estilo editorial de las screenshots.
    --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Source+Serif+4:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">

    {{-- CSS personalizado --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    {{-- Configuración de Tailwind --}}
    <script src="{{ asset('js/tailwind-config.js') }}"></script>

    @stack('styles')
</head>
<body class="min-h-screen">

    {{-- ================================================================
         NAVBAR — Minimalista, sin sombra, solo tipografía
         ================================================================ --}}
    <header class="border-b border-border bg-cream">
        <div class="max-w-4xl mx-auto px-6 py-5 flex items-center justify-between">

            {{-- Branding --}}
            <a href="{{ route('posts.index') }}" class="group">
                <p class="font-display text-lg font-bold text-carbon leading-none group-hover:text-accent transition-colors duration-200">
                    EPyC · Módulo 3
                </p>
                <p class="text-xs text-muted tracking-wide mt-0.5 font-body">
                    por Alberto Ramón Sosa
                </p>
            </a>

            {{-- Navegación --}}
            <nav class="flex items-center gap-8">
                <a href="{{ route('posts.index') }}"
                   class="font-body text-sm text-muted hover:text-carbon transition-colors duration-200">
                    Escritos
                </a>
                <span class="font-body text-sm text-muted/50">·</span>
                <span class="font-body text-sm text-muted/60">Tecmilenio 2026</span>
            </nav>
        </div>
    </header>

    {{-- ================================================================
         CONTENIDO PRINCIPAL
         ================================================================ --}}
    <main>
        @yield('content')
    </main>

    {{-- ================================================================
         FOOTER — Simple, sin ruido
         ================================================================ --}}
    <footer class="border-t border-border mt-20">
        <div class="max-w-4xl mx-auto px-6 py-8 flex items-center justify-between">
            <p class="font-body text-sm text-muted">
                Ética Profesional y Ciudadanía · Módulo 3 · Tecmilenio 2026
            </p>
            <p class="font-body text-sm text-muted">
                Alberto Ramón Sosa Martinez · 3049513
            </p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
