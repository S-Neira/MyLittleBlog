<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Dashboard</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="contenedor">
    <x-header-dashboard></x-header-dashboard>

    <main>


        <div class="boton-crear">
            <h1>Dashboard</h1>
            <a href="{{ route('create-form', $user->id) }}">
                <button>Crear</button>
            </a>

        </div>

        @php
            $userPosts = $posts->where('user_id', $user->id);
        @endphp

        @if ($userPosts->isEmpty())
            <!-- Mensaje si no hay posts -->
            <div class="mensaje-sin-posts" id="mensaje-sin-posts">
                <h3>No tienes ningún post creado todavía. 😢</p>
            </div>
        @else
            <!-- Lista de posts -->
            @foreach ($userPosts as $post)
                <div class="crud-post">
                    <p>Creado en: {{$post->created_at}}</p>
                    <h2>Título: {{ $post->title }}</h2>
                    <h3>Categoría: {{$post->category}}</h3>
                    <p>Contenido: {{ $post->content }}</p>
                    <a href="{{ route('edit', $post->id) }}">Editar</a>
                    <a href="{{ route('delete', $post->id) }}">Eliminar</a>
                </div>
            @endforeach
        @endif


            
    </main>
</body>
</html>