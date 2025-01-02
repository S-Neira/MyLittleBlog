<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Inicio</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="contenedor">

   <x-header></x-header>

    <main>

        <div class="descripcion barra">
            <h3>Este es un blog creado con Laravel 11</h3>
            <p>Un pequeño proyecto funcional de un blog, sientete libre de poder ir a traves de el. Puedes crear una cuenta (falsa) y 
                crear tus propios posts, sin embargo, para evitar el mal uso estos son post visibles solo para tu cuenta.
            </p>

            <div class="sidebar">
                <h3>Categorías</h3>
                <ul>
                    <li><a href="#">Tecnología</a></li>
                    <li><a href="#">Estilo de Vida</a></li>
                    <li><a href="#">Viajes</a></li>
                    <li><a href="#">Opinión</a></li>
                </ul>
            </div>

            <div class="contact-info">
                <h3>Contacto</p>

                <p>Estaré encantado de poder trabajar contigo. ¡Contáctame y veremos como te puedo ayudar!</p>

                <div class="email contacto">
                    <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg class="icono" width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 19H6.2C5.0799 19 4.51984 19 4.09202 18.782C3.71569 18.5903 3.40973 18.2843 3.21799 17.908C3 17.4802 3 16.9201 3 15.8V8.2C3 7.0799 3 6.51984 3.21799 6.09202C3.40973 5.71569 3.71569 5.40973 4.09202 5.21799C4.51984 5 5.0799 5 6.2 5H17.8C18.9201 5 19.4802 5 19.908 5.21799C20.2843 5.40973 20.5903 5.71569 20.782 6.09202C21 6.51984 21 7.0799 21 8.2V10M20.6067 8.26229L15.5499 11.6335C14.2669 12.4888 13.6254 12.9165 12.932 13.0827C12.3192 13.2295 11.6804 13.2295 11.0677 13.0827C10.3743 12.9165 9.73279 12.4888 8.44975 11.6335L3.14746 8.09863M14 21L16.025 20.595C16.2015 20.5597 16.2898 20.542 16.3721 20.5097C16.4452 20.4811 16.5147 20.4439 16.579 20.399C16.6516 20.3484 16.7152 20.2848 16.8426 20.1574L21 16C21.5523 15.4477 21.5523 14.5523 21 14C20.4477 13.4477 19.5523 13.4477 19 14L14.8426 18.1574C14.7152 18.2848 14.6516 18.3484 14.601 18.421C14.5561 18.4853 14.5189 18.5548 14.4903 18.6279C14.458 18.7102 14.4403 18.7985 14.405 18.975L14 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p><a href="mailto:sneira.dev@gmail.com">sneira.dev@gmail.com</a></p>
                </div>
                
                <div class="linkedin contacto">
                    <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg class="icono" width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.5 8C7.32843 8 8 7.32843 8 6.5C8 5.67157 7.32843 5 6.5 5C5.67157 5 5 5.67157 5 6.5C5 7.32843 5.67157 8 6.5 8Z" fill="#0F0F0F"/>
                        <path d="M5 10C5 9.44772 5.44772 9 6 9H7C7.55228 9 8 9.44771 8 10V18C8 18.5523 7.55228 19 7 19H6C5.44772 19 5 18.5523 5 18V10Z" fill="#0F0F0F"/>
                        <path d="M11 19H12C12.5523 19 13 18.5523 13 18V13.5C13 12 16 11 16 13V18.0004C16 18.5527 16.4477 19 17 19H18C18.5523 19 19 18.5523 19 18V12C19 10 17.5 9 15.5 9C13.5 9 13 10.5 13 10.5V10C13 9.44771 12.5523 9 12 9H11C10.4477 9 10 9.44772 10 10V18C10 18.5523 10.4477 19 11 19Z" fill="#0F0F0F"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20 1C21.6569 1 23 2.34315 23 4V20C23 21.6569 21.6569 23 20 23H4C2.34315 23 1 21.6569 1 20V4C1 2.34315 2.34315 1 4 1H20ZM20 3C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3H20Z" fill="#0F0F0F"/>
                    </svg>
                    <p><a href="https://www.linkedin.com/in/sergio-neira-2b2689344/" target="_blank">LinkedIn</a></p>
                </div>

                <div class="github contacto">
                    <?xml version="1.0" encoding="UTF-8" standalone="no"?>
                    <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg  class="icono" width="800px" height="800px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        
                        <title>github [#142]</title>
                        <desc>Created with Sketch.</desc>
                        <defs>

                    </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Dribbble-Light-Preview" transform="translate(-140.000000, -7559.000000)" fill="#000000">
                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                    <path d="M94,7399 C99.523,7399 104,7403.59 104,7409.253 C104,7413.782 101.138,7417.624 97.167,7418.981 C96.66,7419.082 96.48,7418.762 96.48,7418.489 C96.48,7418.151 96.492,7417.047 96.492,7415.675 C96.492,7414.719 96.172,7414.095 95.813,7413.777 C98.04,7413.523 100.38,7412.656 100.38,7408.718 C100.38,7407.598 99.992,7406.684 99.35,7405.966 C99.454,7405.707 99.797,7404.664 99.252,7403.252 C99.252,7403.252 98.414,7402.977 96.505,7404.303 C95.706,7404.076 94.85,7403.962 94,7403.958 C93.15,7403.962 92.295,7404.076 91.497,7404.303 C89.586,7402.977 88.746,7403.252 88.746,7403.252 C88.203,7404.664 88.546,7405.707 88.649,7405.966 C88.01,7406.684 87.619,7407.598 87.619,7408.718 C87.619,7412.646 89.954,7413.526 92.175,7413.785 C91.889,7414.041 91.63,7414.493 91.54,7415.156 C90.97,7415.418 89.522,7415.871 88.63,7414.304 C88.63,7414.304 88.101,7413.319 87.097,7413.247 C87.097,7413.247 86.122,7413.234 87.029,7413.87 C87.029,7413.87 87.684,7414.185 88.139,7415.37 C88.139,7415.37 88.726,7417.2 91.508,7416.58 C91.513,7417.437 91.522,7418.245 91.522,7418.489 C91.522,7418.76 91.338,7419.077 90.839,7418.982 C86.865,7417.627 84,7413.783 84,7409.253 C84,7403.59 88.478,7399 94,7399" id="github-[#142]">

                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <p><a href="https://github.com/S-Neira">Github</a></p>
                </div>
                
            </div>
        </div>


        <aside>

            <div class="imagenes">
                <img class="imagen-principal" src="{{ asset('img/blog.jpg') }}" alt="imagen blog">
                <img class="imagen-secundaria" src="{{ asset('img/living.jpg') }}" alt="imagen living">
            </div>

            <h2>Ultimos Posts</h2>
            <div class="posts">

                <div class="imagenes-post">
                    <img src="{{asset('img/cameras.jpg')}}" alt="foto camaras">
                    <img src="{{asset('img/woman.jpg')}}" alt="foto mujer">
                </div>

                <div class="content">
                
                    <ul>
                        @foreach ($posts as $post)
                            <li>
                                <h3>{{ $post->title }}</h3>
                                <p>{{ $post->content }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </aside>
        


    </main>

    <x-footer></x-footer>
</body>
</html>
