<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Muestra la lista de todos los posts publicados.
     *
     * Se ordenan por topic_number para mantener el orden curricular del módulo.
     * Route: GET /
     */
    public function index(): View
    {
        $posts = Post::published()
            ->orderBy('topic_number')
            ->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Muestra un post individual.
     *
     * Laravel resuelve automáticamente el modelo Post usando el slug
     * gracias al método getRouteKeyName() definido en el modelo.
     * Si el slug no existe, Laravel lanza un 404 automáticamente.
     *
     * Route: GET /posts/{post}
     */
    public function show(Post $post): View
    {
        // Si el post no está publicado, respondemos con 404.
        // Usamos abort_if para mantener la lógica limpia sin un if-else.
        abort_if(! $post->is_published, 404);

        return view('posts.show', compact('post'));
    }
}
