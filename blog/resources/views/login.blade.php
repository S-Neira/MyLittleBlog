
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Login</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="contenedor">
    <!-- logo -->
    <x-header></x-header>

    <div class="contenedor-form">


        <form action="{{route('login')}}" class="login" method="POST">
            <legend>Iniciar Sesión</legend>
            @csrf
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input class="input" type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input class="input" type="password" name="password" id="password" required>
            </div>

            <a href="{{route('register')}}">¿No tienes una cuenta? Regístrate</a>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
    <x-footer></x-footer>
</body>
</html>



