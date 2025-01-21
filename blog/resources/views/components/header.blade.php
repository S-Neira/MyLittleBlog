<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div class="header">
    <a href="{{route('index')}}">
        <header>
            <div class="logo">
                <h1>MyLittle</h1>
                <h1 class="logo-blog">Blog</h1>
            </div>
        </header>
    </a>

    <div 
    class="nav-display"
    x-data="{visible : false, show : false}"
    x-init="show = window.innerWidth < 768; window.addEventListener('resize', () => { show = window.innerWidth < 768; })"
    x-cloak
    >
        <button 
        class="boton-nav"
        x-show ="show"
        @click="visible = !visible"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
                        
        </button>

        <style>
            [x-cloak] {
            display: none !important;
          }
        </style>
        
    
        <nav
        class="nav"
        :class = "{ 'hidden' : show && !visible }"
        x-show="!show || visible"
        x-transition    
        >
            <ul>
                <li><a href="{{ route('index') }}">Inicio</a></li>
                <li><a href="{{ route('posts') }}">Posts</a></li>
                <li><a href="https://github.com/S-Neira/Me">Acerca de</a></li>
                @if (Auth::check())
                    <!-- Botón de Panel de Control -->
                    <li><a href="{{ route('dashboard', Auth::id()) }}">Panel Control</a></li>
    
                    <!-- Botón para abrir el modal -->
                    <li>
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <input class="boton" type="submit" value="Cerrar Sesión">
                        </form>                        
                    </li>
                @else
                    <!-- Botones de iniciar sesión y registro si no está logueado -->
                    <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                    <li><a href="{{ route('register') }}">Registrarse</a></li> 
                @endif
            </ul>
        </nav>

        <style>
            .hidden{
                display: none !important;
            }
        </style>
    </div>

   

    <!-- Por defecto que el logout modal esté como oculto -->

    <!-- Modal para confirmar cierre de sesión -->
    @if (Auth::check())
    <div id="logoutModal" class="modal" style="display:none;" >
        <div class="modal-content">
            <h2>¿Estás seguro de cerrar sesión?</h2>
            <p>Esto eliminará tu cuenta y todos tus posts de forma permanente.</p>
            <div class="modal-buttons">
                <button id="cancelButton" class="btn btn-secondary">Cancelar</button>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button id="confirmButton" class="btn btn-danger" type="submit">Eliminar Cuenta y Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
