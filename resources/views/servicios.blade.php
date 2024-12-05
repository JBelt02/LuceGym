<x-app-layout>
    <div class="nine">
        <h1 class="text-white text-4xl font-bold mt-10 mb-10 pl-5 text-center">Luce Gym<span>Tu gimnasio de confianza</span></h1>
    </div>
    
    <h2 class="text-white text-3xl font-bold mt-10 mb-10 pl-5">Nuestros Servicios</h2>

    <!-- Grid de tarjetas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-5">
        <!-- Servicio 1 -->
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg" src="{{ asset('images/servicio1.jpg') }}" alt="Entrenamiento Personalizado" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Entrenamiento Personalizado</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    Recibe una atención 100% personalizada con nuestros entrenadores expertos. Diseñamos un plan de entrenamiento adaptado a tus objetivos.
                </p>
            </div>
        </div>

        <!-- Servicio 2 -->
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg" src="{{ asset('images/servicio2.jpg') }}" alt="Clases Grupales" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Clases Grupales</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    Únete a nuestras dinámicas clases grupales de yoga, pilates, Zumba, y más. Perfecto para socializar mientras te pones en forma.
                </p>
            </div>
        </div>

        <!-- Servicio 3 -->
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg" src="{{ asset('images/servicio3.jpg') }}" alt="Sala de Fitness" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sala de Fitness</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    Accede a una sala equipada con máquinas de última tecnología para cardio, fuerza y musculación. Ideal para entrenar a tu ritmo.
                </p>
            </div>
        </div>

        <!-- Servicio 4 -->
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-10 mb-5">
            <a href="#">
                <img class="rounded-t-lg" src="{{ asset('images/servicio4.jpg') }}" alt="Spa y Relajación" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Spa y Relajación</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    Relájate después de un intenso entrenamiento en nuestro spa. Disfruta de sauna, jacuzzi y masajes terapéuticos.
                </p>
            </div>
        </div>

        <!-- Servicio 5 -->
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-10 mb-5">
            <a href="#">
                <img class="rounded-t-lg" src="{{ asset('images/servicio5.jpg') }}" alt="Nutrición y Dietética" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Nutrición y Dietética</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    Consulta con nuestros nutricionistas para crear un plan alimenticio que complemente tu rutina de ejercicios y mejore tu salud.
                </p>
            </div>
        </div>

        <!-- Servicio 6 -->
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-10 mb-5">
            <a href="#">
                <img class="rounded-t-lg" src="{{ asset('images/servicio6.png') }}" alt="Asesoramiento Deportivo" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Asesoramiento Deportivo</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    Obtén orientación profesional para alcanzar tus metas deportivas, ya sea mejorar tu rendimiento o prepararte para una competición.
                </p>
            </div>
        </div>
    </div>

    <section class="call-to-action-box py-10 bg-gray-100 text-gray-900 mb-10 mt-10">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center px-6">
            <div class="text-content">
                <p class="text-lg font-semibold text-white">¿ Quieres ver todo lo que ofrecemos ?</p>
            </div>
            <div class="button-content mt-4 md:mt-0">
                <a href="/login" class="cta-button"> Iniciar Sesion</a>
                <a href="/register" class="cta-button ml-4">Registrarse </a>
            </div>
        </div>
    </section>


    <style>
       /* Style 9
   ----------------------------- */
    .nine h1 {
    text-align:center; font-size:50px; text-transform:uppercase; color:#ffffff; letter-spacing:1px;
    font-family:"Playfair Display", serif; font-weight:400;
    margin-right: 20px;
    }

.nine h1 span {
  margin-top: 5px;
    font-size:15px; color:#bbb0b0; word-spacing:1px; font-weight:normal; letter-spacing:2px;
    text-transform: uppercase; font-family:"Raleway", sans-serif; font-weight:500;

    display: grid;
    grid-template-columns: 1fr max-content 1fr;
    grid-template-rows: 27px 0;
    grid-gap:20px;
    align-items: center;
    
}

.nine h1 span:after,.nine h1 span:before {
    content: " ";
    display: block;
    border-bottom: 1px solid #bbb0b0;
    border-top: 1px solid #bbb0b0;
    height: 5px;
    background-color:#bbb0b0;
    width: 100%;
} 
.call-to-action-box {
    background-color: rgb(49, 64, 78); /* Fondo claro */
    border-top: 3px solid #f8f8f8; /* Línea superior de color */
}

.call-to-action-box .text-content {
    flex: 1; /* Ocupa el ancho disponible */
    max-width: 70%; /* Para que el texto no ocupe todo */
}

.call-to-action-box .button-content {
    flex-shrink: 0; /* El botón mantiene su tamaño */
}

.cta-button {
    background-color: #ff5733;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.cta-button:hover {
    background-color: #e64e2b;
}

    </style>
</x-app-layout>
