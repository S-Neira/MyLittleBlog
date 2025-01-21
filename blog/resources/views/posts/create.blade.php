<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Create</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="contenedor">
    <x-header></x-header>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="contenedor-form">
            <form class="login" method="POST" action="{{route('create', $user->id)}}"  enctype="multipart/form-data">
                <legend>Crear Post</legend>
                @csrf
                <div class="form-group">
                    <label for="titulo">titulo</label>
                    <input class="input" type="text" name="title" id="titulo">
                </div>

                <div class="form-group">
                    <label for="categoria">categoría</label>
                    <input class="input" type="text" name="category" id="categoria">
                </div>

                <div class="form-group">
                    <label for="slug">slug</label>
                    <input class="input" type="text" name="slug" id="slug">
                </div>

                <div class="form-group">
                    <label for="img">Imagen</label>
                    <input class="input" type="file" name="img" id="img" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label for="contenido">contenido</label>
                    <textarea class="input" name="content" id="contenido" cols="30" rows="10"></textarea>
                </div>

                <button type="submit" class="crear-post" >Crear</button>

            </form>
        </div>
</body>
</html>