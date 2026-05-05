<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table('posts')]
#[Fillable(['title', 'topic_number', 'slug', 'excerpt', 'content', 'image_path', 'resources', 'is_published'])]
class Post extends Model
{
    /**
     * Casteo de tipos automático por Eloquent.
     * 'resources' se deserializa automáticamente de JSON a array de PHP
     * al acceder a $post->resources, y se serializa al guardar.
     */
    protected function casts(): array
    {
        return [
            'resources' => 'array',
            'is_published' => 'boolean',
        ];
    }

    /**
     * Le indica a Laravel que use el campo 'slug' para el Route Model Binding
     * en lugar del 'id' por defecto.
     *
     * Esto permite usar `Post::findOrFail($slug)` implícitamente en rutas
     * definidas como Route::get('/posts/{post}', ...).
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // -----------------------------------------------------------------
    // Query Scopes
    // -----------------------------------------------------------------

    #[Scope]
    protected function published($query)
    {
        return $query->where('is_published', true);
    }

    // -------------------------------------------------------------------------
    // Accessors
    // -------------------------------------------------------------------------

    /**
     * Calcula el tiempo estimado de lectura basado en el contenido HTML.
     * Asume una velocidad promedio de 200 palabras por minuto.
     *
     * Uso en Blade: {{ $post->reading_time }}
     */
    public function getReadingTimeAttribute(): string
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = (int) ceil($wordCount / 200);

        return $minutes.' min de lectura';
    }

    /**
     * Devuelve el ícono SVG/emoji según el tipo de recurso.
     * Este método centraliza la lógica de presentación para no repetirla en Blade.
     *
     * Uso en Blade: {{ Post::iconForResourceType($resource['type']) }}
     */
    public static function iconForResourceType(string $type): string
    {
        return match ($type) {
            'video' => '▶',
            'tool' => '🔧',
            'simulator' => '🌐',
            'link' => '↗',
            default => '↗',
        };
    }

    /**
     * Devuelve la etiqueta legible según el tipo de recurso.
     *
     * Uso en Blade: {{ Post::labelForResourceType($resource['type']) }}
     */
    public static function labelForResourceType(string $type): string
    {
        return match ($type) {
            'video' => 'VIDEO',
            'tool' => 'HERRAMIENTA',
            'simulator' => 'SIMULADOR',
            'link' => 'ENLACE',
            default => 'ENLACE',
        };
    }
}
