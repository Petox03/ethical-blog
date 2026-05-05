{{--
    Vista: posts/index.blade.php
    Muestra la lista editorial de los 5 posts del Módulo 3.
    Diseño basado en el estilo minimalista de las screenshots: lista con separadores,
    tipografía serif, sin cards con bordes pesados.
--}}
@extends('layouts.app')

@section('title', 'Escritos · Módulo 3')

@section('content')

    {{-- ================================================================
         HERO / INTRO DE LA PÁGINA
         ================================================================ --}}
    <section class="max-w-4xl mx-auto px-6 pt-16 pb-10">
        <p class="font-body text-base text-carbon/80 leading-relaxed max-w-xl">
            Un análisis de cinco subtemas esenciales del Módulo 3 de Ética Profesional
            y Ciudadanía, escritos desde la perspectiva de un desarrollador de software.
            Cada entrada integra teoría, recursos y ejemplos de aplicación técnica.
        </p>
    </section>

    {{-- ================================================================
         LISTA DE POSTS
         ================================================================ --}}
    <section class="max-w-4xl mx-auto px-6 pb-20">

        @forelse($posts as $post)

            {{-- Separador superior (solo el primero) --}}
            @if($loop->first)
                <div class="border-t border-border"></div>
            @endif

            {{-- --------------------------------------------------------
                 POST CARD — Estilo editorial, sin fondo de color
                 -------------------------------------------------------- --}}
            <article class="py-10 group">

                {{-- Meta: fecha + tiempo de lectura --}}
                <div class="flex items-center justify-between mb-3">
                    <span class="font-body text-sm text-muted">
                        Subtema {{ $post->topic_number }}
                    </span>
                    <span class="font-body text-sm text-muted">
                        {{ $post->reading_time }}
                    </span>
                </div>

                {{-- Título --}}
                <h2 class="font-display text-2xl font-bold text-carbon mb-3 leading-snug
                            group-hover:text-accent transition-colors duration-200">
                    <a href="{{ route('posts.show', $post) }}">
                        {{ $post->title }}
                    </a>
                </h2>

                {{-- Excerpt --}}
                <p class="font-body text-base text-muted leading-relaxed mb-5 max-w-2xl font-light">
                    {{ $post->excerpt }}
                </p>

                {{-- CTA --}}
                <a href="{{ route('posts.show', $post) }}"
                   class="inline-flex items-center gap-2 font-body text-sm font-semibold
                          text-carbon hover:text-accent transition-colors duration-200">
                    Leer más <span aria-hidden="true">→</span>
                </a>
            </article>

            {{-- Separador inferior --}}
            <div class="border-t border-border"></div>

        @empty

            <p class="font-body text-muted py-10">
                No hay entradas publicadas aún.
            </p>

        @endforelse

    </section>

@endsection
