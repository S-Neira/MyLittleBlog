<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Show</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="contenedor">
    <x-header></x-header>

    <div class="contenedor-post">
        <h2>{{ $post->title }}</h1>
        <h3>Categoría: {{$post->category}}</h2>
        <p>Autor: {{$post->user->name}} {{$post->user->lastname}}</p>
        <img class="imagen-post" src="{{ asset( $post->image) }}" alt="Imagen del post">
        <p>{{ $post->content }}</p>
    </div>

    <a class="boton-volver" href="{{route('posts')}}">Volver</a>

    <x-footer></x-footer>

</body>
</html>