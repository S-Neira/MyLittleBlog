<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Dashboard</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/dashboard.js', 'resources/js/app.js'])

</head>

<body class="contenedor">
    <x-header></x-header>

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


            <div class="posts">


                <!-- Lista de posts -->
                @foreach ($userPosts as $post)
                    <div
                    class="crud-post"
                    x-data="{visible:false}"
                    >
                        <p>Creado en: {{$post->created_at}}</p>
                        <h2>Título: {{ $post->title }}</h2>
                        <h3>Categoría: {{$post->category}}</h3>
                        <p>Contenido: {{ $post->content }}</p>
                        <a href="{{ route('edit-form', $post->id) }}">Editar</a>
                        <a @click.prevent="visible=true" class="delete-post" href="#">Eliminar</a>

                        <template x-teleport="body">
                            <div x-show="visible" id="deleteModal" class="modal">
                                <div x-show="visible" x-transition class="modal-content">
                                    <h2>¿Estás seguro de eliminar este post?</h2>
                                    <p>Esta acción no se puede deshacer.</p>
                                    <div class="modal-buttons">
                                        <button @click="visible = false" id="cancelButton" class="btn btn-secondary">No</button>
                                        <a id="confirmButton" href="{{ route('delete', $post->id) }}" class="btn btn-danger">Sí</a>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                @endforeach
            </div>
        @endif

    </main>

    <x-footer></x-footer>
</body>
</html>