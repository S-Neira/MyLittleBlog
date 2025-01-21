<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Posts</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
</head>
<body class="contenedor">
    <x-header></x-header>

    <main class="main-posts">
    
        {{-- Panel de busqueda --}}
        <div class="panel-busqueda">
            <h1>Posts</h1>
            <form class="formulario-busqueda" action="{{route('search')}}" method="post">
                @csrf
                <input type="text" name="search" placeholder="Busca aquí">
                <input class="boton-busqueda" type="submit" value="buscar">
            </form>
        </div>

        <article class="posts">
            @foreach ($posts as $post)
                <div class="post">
                    <h2>{{ $post->title }}</h2>
                    <h3>Categoría: {{$post->category}}</h3>
                    <p>Autor: {{$post->user->name}} {{$post->user->lastname}}</p>
                    <p>{{ Str::limit($post->content, 150) }}</p>
                    <a href="{{ route('posts.show', $post->slug) }}">Leer más</a>
                </div>
            @endforeach
        </article>
    
        <div class="botones-paginacion">
            @if ($posts->onFirstPage())
                <a class="disabled">Anterior</a>
            @else
                <a href="{{ $posts->previousPageUrl() }}">Anterior</a>
            @endif
        
            @if ($posts->hasMorePages())
                <a href="{{ $posts->nextPageUrl() }}">Siguiente</a>
            @else
                <a class="disabled">Siguiente</a>
            @endif
        </div>
    </main>

    <x-footer></x-footer>
</body>
</html>