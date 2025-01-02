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

    <h1>Posts</h1>

    <div class="posts">
        @foreach ($posts as $post)
            <div class="post">
                <h2>{{ $post->title }}</h2>
                <p>{{ Str::limit($post->content, 150) }}</p>
                <a href="{{ route('posts.show', $post->id) }}">Leer más</a>
            </div>
        @endforeach
    </div>

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
    

    <x-footer></x-footer>
</body>
</html>