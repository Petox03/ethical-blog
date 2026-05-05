{{--
    Vista: posts/show.blade.php
    Muestra un post individual.

    Estructura visual (basada en screenshots):
    1. Barra de navegación "← Volver al blog"
    2. Hero oscuro full-width con título, excerpt y metadata
    3. Columna de contenido HTML centrada con tipografía serif
    4. Recursos complementarios como grid de 3 cards (por cada bloque JSON)
--}}
@extends('layouts.app')

@section('title', $post->title)

@section('content')

    {{-- ================================================================
         BARRA DE NAVEGACIÓN CONTEXTUAL — "← Volver al blog"
         Posicionada fuera del hero, justo debajo del navbar principal.
         ================================================================ --}}
    <div class="border-b border-border bg-cream">
        <div class="max-w-5xl mx-auto px-6 py-3">
            <a href="{{ route('posts.index') }}"
               class="inline-flex items-center gap-2 font-body text-sm text-muted
                      hover:text-carbon transition-colors duration-200">
                <span aria-hidden="true">←</span> Volver al blog
            </a>
        </div>
    </div>

    {{-- ================================================================
         HERO — Fondo negro/carbón con título grande en blanco
         Coincide con el diseño de la screenshot 2.
         ================================================================ --}}
    <div class="relative bg-carbon overflow-hidden">

        {{-- Imagen de fondo con overlay oscuro para legibilidad --}}
        @if($post->image_path)
            <div class="absolute inset-0 z-0">
                <img src="{{ $post->image_path }}"
                     alt="Imagen de portada: {{ $post->title }}"
                     class="w-full h-full object-cover opacity-20">
            </div>
        @endif

        {{-- Contenido del hero --}}
        <div class="relative z-10 max-w-4xl mx-auto px-6 py-20">

            {{-- Meta: módulo + tiempo de lectura --}}
            <div class="flex items-center gap-3 mb-6 text-white/60 font-body text-sm">
                <span>Módulo 3</span>
                <span>·</span>
                <span>Subtema {{ $post->topic_number }}</span>
                <span>·</span>
                <span>{{ $post->reading_time }}</span>
            </div>

            {{-- Título principal --}}
            <h1 class="font-display text-4xl md:text-5xl font-bold text-white leading-tight mb-6 max-w-3xl">
                {{ $post->title }}
            </h1>

            {{-- Excerpt / subtítulo --}}
            <p class="font-body text-lg text-white/75 leading-relaxed max-w-2xl font-light">
                {{ $post->excerpt }}
            </p>

        </div>
    </div>

    {{-- ================================================================
         CONTENIDO DEL POST
         El HTML está almacenado directamente en la base de datos y se imprime
         con {!! !!} de forma segura, ya que el contenido es controlado
         únicamente por nosotros (hardcodeado en la migración, sin input de usuarios).
         ================================================================ --}}
    <div class="max-w-3xl mx-auto px-6 py-16">
        <div class="prose">
            {!! $post->content !!}
        </div>
    </div>

    {{-- ================================================================
         RECURSOS COMPLEMENTARIOS
         Se itera sobre el campo JSON `resources` del post.
         Cada recurso tiene: type (video|link|tool|simulator), label, url.
         Se renderizan como un grid de cards, igual que en la screenshot 3.
         ================================================================ --}}
    @if(!empty($post->resources))
        <div class="max-w-3xl mx-auto px-6 pb-20">

            <div class="border-t border-border pt-10">

                {{-- Encabezado de sección --}}
                <h2 class="font-display text-xl font-bold text-carbon mb-6 flex items-center gap-2">
                    <span class="text-accent">📖</span>
                    Recursos Complementarios
                </h2>

                {{-- Grid de cards de recursos --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

                    @foreach($post->resources as $resource)
                        {{--
                            Componente ResourceCard - encapsula la lógica de visualización
                            de recursos individuales (video, link, tool, simulator)
                        --}}
                        <x-resource-card :resource="$resource" />
                    @endforeach

                </div>
            </div>
        </div>
    @endif

    {{-- ================================================================
         NAVEGACIÓN ENTRE POSTS — anterior / siguiente
         ================================================================ --}}
    <div class="max-w-3xl mx-auto px-6 pb-16">
        <div class="border-t border-border pt-10 flex justify-between items-center">

            <a href="{{ route('posts.index') }}"
               class="inline-flex items-center gap-2 font-body text-sm text-muted
                      hover:text-carbon transition-colors duration-200">
                <span aria-hidden="true">←</span> Todos los escritos
            </a>

            <span class="font-body text-xs text-muted/50 tracking-widest uppercase">
                Subtema {{ $post->topic_number }}
            </span>

        </div>
    </div>

@endsection
