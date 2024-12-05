<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LuceGym') }}</title>
        

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Contenido principal -->
            <div class="flex-grow">
                @include('layouts.navigation')
    
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset
    
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
    
            <!-- Footer -->
            <footer class="bg-gray-900 text-white py-10">
                <div class="container mx-auto px-4">
                    <!-- Logo y Mensaje -->
                    <div class="flex flex-col items-center md:flex-row md:justify-between mb-8">
                        <!-- Logo -->
                        <div class="flex items-center space-x-3">
                            <img src="{{ asset('images/logo.png') }}" alt="Luce Gym" class="w-32 h-32">
                            <h2 class="text-2xl font-bold">Luce Gym</h2>
                        </div>
                        <!-- Mensaje -->
                        <p class="text-center md:text-right text-gray-400 mt-4 md:mt-0">
                            © 2024 Luce Gym. Todos los derechos reservados.
                        </p>
                    </div>
            
                    <!-- Redes Sociales -->
                    <div class="text-center mb-8">
                        <h3 class="text-xl font-bold mb-4">Encuéntranos en nuestras redes sociales</h3>
                        <div class="flex justify-center space-x-6">
                            <a href="https://facebook.com" target="_blank" aria-label="Facebook" class="text-gray-400 hover:text-blue-500">
                                <i class="fab fa-facebook fa-2x"></i>
                            </a>
                            <a href="https://instagram.com" target="_blank" aria-label="Instagram" class="text-gray-400 hover:text-pink-500">
                                <i class="fab fa-instagram fa-2x"></i>
                            </a>
                            <a href="https://twitter.com" target="_blank" aria-label="Twitter" class="text-gray-400 hover:text-blue-400">
                                <i class="fab fa-twitter fa-2x"></i>
                            </a>
                            <a href="https://youtube.com" target="_blank" aria-label="YouTube" class="text-gray-400 hover:text-red-500">
                                <i class="fab fa-youtube fa-2x"></i>
                            </a>
                        </div>
                    </div>
            
                    <!-- Información Adicional -->
                    <div class="text-center text-gray-400 space-y-4">
                        <p>Tu salud y bienestar son nuestra prioridad. Únete a Luce Gym y comienza tu viaje hacia un estilo de vida más saludable hoy.</p>
                        <p>Ubicación: Calle Fitness, 123, Ciudad Gym • Teléfono: +34 123 456 789</p>
                    </div>
                </div>
            </footer>
        </div>
    
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    
        <style>
            footer {
                background: linear-gradient(to top, #111827, #1f2937); /* Fondo elegante */
            }
    
            footer a {
                transition: color 0.3s ease; /* Animación suave al pasar el ratón */
            }
    
            footer i {
                transition: transform 0.3s ease; /* Animación suave para iconos */
            }
    
            footer a:hover i {
                transform: scale(1.1); /* Escala los iconos al pasar el ratón */
            }
        </style>
    </body>
</html>
