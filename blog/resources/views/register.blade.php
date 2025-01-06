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
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" class="login register" method="POST">
            <legend>Registrarse</legend>
            @csrf

            <fieldset class="info-personal">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input class="input" type="text" name="name" id="name" value="{{ old('name') }}" required>
                </div>
    
                <div class="form-group">
                    <label for="lastname">Apellido</label>
                    <input class="input" type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" required>
                </div>
            </fieldset>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input class="input" type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input class="input" type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input class="input" type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <button type="submit">Crear Usuario</button>
        </form>
    </div>

    <x-footer></x-footer>
</body>
</html>
