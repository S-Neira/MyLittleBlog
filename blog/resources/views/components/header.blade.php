<div class="header">
    <a href="{{route('index')}}">
        <header>
            <div class="logo">
                <h1>MyLittle</h1>
                <h1 class="logo-blog">Blog</h1>
            </div>
        </header>
    </a>

    <nav class="nav">
        <ul>
            <li><a href="{{ route('index') }}">Inicio</a></li>
            <li> <a href="{{ route('posts') }}">Posts</a></li>
            <li><a href="https://github.com/S-Neira/Me">Acerca de</a></li>
            @if (Auth::check())
            <!-- Botón de cerrar sesión si está logueado -->
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <a href="">
                        <button class="boton-cerrar-sesion" type="submit">Cerrar Sesión</button>
                    </a>
                </form>
            </li>

            @else
                <!-- Botones de iniciar sesión y registro si no está logueado -->
                <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                <li><a href="{{ route('register') }}">Registrarse</a></li> 
            @endif
        </ul>
        
       
        
        
    

    </nav>
</div>