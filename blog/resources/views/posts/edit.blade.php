<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Edit</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="contenedor">
    <x-header-dashboard></x-header-dashboard>

        <div class="contenedor-form">
            <form class="login" method="POST" action="{{route('edit', $post->id)}}">
                <legend>Editar Post</legend>
                @csrf
                <div class="form-group">
                    <label for="titulo">titulo</label>
                    <input class="input" type="text" name="title" id="titulo" value="{{$post->title}}">
                </div>

                <div class="form-group">
                    <label for="categoria">categoría</label>
                    <input class="input" type="text" name="category" id="categoria" value="{{$post->category}}">
                </div>

                <div class="form-group">
                    <label for="slug">slug</label>
                    <input class="input" type="text" name="slug" id="slug" value="{{$post->slug}}">
                </div>

                <div class="form-group">
                    <label for="contenido">contenido</label>
                    <textarea class="input" name="content" id="contenido" cols="30" rows="10"> {{$post->content}} </textarea>
                </div>

                <button type="submit" class="crear-post" >Actualizar</button>

            </form>
        </div>
</body>
</html>