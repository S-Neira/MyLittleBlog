<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Inicio</title>
</head>
<body>

    <div class="header">
        <header>
            <h1>Bienvenido a MyLittleBlog</h1>
            <p>Este es un blog creado con Laravel 11>
        </header>
    
        <nav>
            <ul>
                <li><a href="{{ route('posts') }}">Posts</a></li>
                <li><a href="{{ route('login') }}">Iniciar Sesion</a></li>
                <li><a href="{{ route('about') }}">Acerca de</a></li>
                <li><a href="{{ route('contact') }}">Contacto</a></li>
            </ul>
        </nav>
    </div>


    <div class="content">
        <h2>Ultimos Posts</h2>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->content }}</p>
                </li>
            @endforeach
        </ul>
    </div>


    



</body>
</html>
