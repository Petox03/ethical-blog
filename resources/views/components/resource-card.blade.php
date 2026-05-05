{{--
    Componente: ResourceCard
    Muestra una card de recurso (video, link, tool, simulator)
    
    Uso: <x-resource-card :resource="$resource" />
--}}
@props(['resource'])

<a href="{{ $resource['url'] }}"
   target="_blank"
   rel="noopener noreferrer"
   class="block p-5 border border-border rounded-lg bg-cream
          hover:border-accent hover:shadow-sm transition-all duration-200 group"
   {{ $attributes }}>

    {{-- Tipo de recurso (badge) --}}
    <div class="flex items-center gap-2 mb-3">
        <span class="text-accent text-sm" aria-hidden="true">
            {{-- El modelo centraliza el ícono según el tipo --}}
            {{ \App\Models\Post::iconForResourceType($resource['type']) }}
        </span>
        <span class="font-body text-xs font-semibold tracking-widest text-muted uppercase">
            {{ \App\Models\Post::labelForResourceType($resource['type']) }}
        </span>
    </div>

    {{-- Nombre del recurso --}}
    <p class="font-body text-sm font-semibold text-carbon leading-snug
              group-hover:text-accent transition-colors duration-200">
        {{ $resource['label'] }}
    </p>

</a>