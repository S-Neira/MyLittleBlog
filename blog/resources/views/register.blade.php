<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Register</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="contenedor">
    <x-header></x-header>

    <div class="contenedor-form">
        <form action="{{route('register')}}" class="login register" method="POST">
            <legend>Registrarse</legend>
            @csrf

            <fieldset class="info-personal">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input class="input" type="text" name="name" id="name" required>
                </div>
    
                <div class="form-group">
                    <label for="lastname">Apellido</label>
                    <input class="input" type="text" name="lastname" id="lastname" required>
                </div>
            </fieldset>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input class="input" type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="last-name">Contraseña</label>
                <input class="input" type="password" name="password" id="username" required>
            </div>

            <input class="register-button" type="submit" value="Registrar">

        </form>
   



</body>
</html>