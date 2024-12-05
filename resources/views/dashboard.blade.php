<x-app-layout>
    <div class="nine">
        <h1 class="text-white text-4xl font-bold mt-10 mb-10 pl-5 text-center">Luce Gym<span>Tu gimnasio de confianza</span></h1>
    </div>

    <div id="default-carousel" class="relative w-full mt-10" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/carf1.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/carf2.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/carf3.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/carf4.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/carf5.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Anterior</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Siguiente</span>
            </span>
        </button>
    </div>

    <h2 class="text-white text-3xl font-bold mt-10 mb-10 pl-5">A qué nos dedicamos</h2>

    <!-- Grid de tarjetas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-5 pb-5 ml-20">
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="">
                <img class="rounded-t-lg tarjeta-imagen" src="{{ asset('images/inicio1.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Entrenamiento Personalizado</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Recibe una atención 100% adaptada a tus objetivos con nuestros entrenadores personales. Diseñamos un plan exclusivo para ti."
                    Imagen: Una foto de un entrenador trabajando con un cliente</p>
            </div>
        </div>
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg tarjeta-imagen" src="{{ asset('images/inicio2.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Clases Grupales</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Únete a nuestras dinámicas clases grupales como yoga, pilates, spinning, y más. Perfectas para socializar mientras te mantienes en forma.</p>
            </div>
        </div>
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg tarjeta-imagen" src="{{ asset('images/inicio3.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sala de Fitness</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Accede a una sala equipada con las mejores máquinas de última tecnología para cardio, fuerza y musculación. Ideal para todos los niveles.</p>
            </div>
        </div>
    </div>

    <div class="separator-line mb-20"></div>


    <section class="bg-gray-100 text-gray-800 py-12 dark:bg-gray-800 dark:border-gray-700 mt-10 mb-10">
      <h2 class="text-3xl font-bold text-center mb-6 text-white">Lo que dicen nuestros clientes</h2>
      <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-white p-6 rounded-lg shadow-lg">
              <p class="italic">"¡Entrenar en Luce Gym ha sido una experiencia increíble! Los entrenadores son excelentes y las instalaciones son de primera."</p>
              <p class="text-right mt-4 font-bold">- Ana García</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg">
              <p class="italic">"Gracias a sus clases grupales he alcanzado mis objetivos. ¡Altamente recomendado!"</p>
              <p class="text-right mt-4 font-bold">- Juan Pérez</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg">
              <p class="italic">"Me encanta el ambiente del gimnasio, perfecto para motivarse y alcanzar metas."</p>
              <p class="text-right mt-4 font-bold">- Laura Gómez</p>
          </div>
      </div>
  </section>

  <div class="separator-line mb-20"></div>

     <!-- Contact Header Section -->
     <section class="pb-20 relative block bg-black text-white mt-40">
        <div
          class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
          style="height: 80px; transform: translateZ(0px)"
        >
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
        <div class="container mx-auto px-4 lg:pt-24 lg:pb-64 pb-20 pt-20">
          <div class="flex flex-wrap text-center justify-center">
            <div class="w-full lg:w-6/12 px-4">
              <h2 class="text-4xl font-semibold text-white uppercase">
                Contacta con nosotros
              </h2>
              <p class="text-lg leading-relaxed mt-4 mb-4">
                Contacta si tienes cualquier tipo de duda sobre nuestros servicios
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Contact Form -->
<section class="relative block py-24 lg:pt-0 bg-black ">
  <div class="container mx-auto px-4">
      <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
          <div class="w-full lg:w-6/12 px-4">
              <div
                  class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300"
                  data-aos="fade-up-right"
              >
                  <div class="flex-auto p-5 lg:p-10 bg-orange-500 text-white">
                      <h4 class="text-2xl font-semibold">¿Necesitas ayuda?</h4>
                      <p class="leading-relaxed mt-1 mb-4">
                          Completa este formulario y mi equipo te atenderá lo antes posible.
                      </p>
                      <!-- Formulario -->
                      <form action="{{ route('contact.send') }}" method="POST">
                          @csrf
                          <div class="relative w-full mb-3 mt-8">
                              <label
                                  class="block uppercase text-xs font-bold mb-2"
                                  for="nombre"
                              >Nombre Completo</label>
                              <input
                                  type="text"
                                  name="nombre"
                                  id="nombre"
                                  class="px-3 py-3 placeholder-gray-400 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full text-black"
                                  placeholder="Nombre Completo"
                                  style="transition: all 0.15s ease 0s"
                                  required
                              />
                          </div>
                          <div class="relative w-full mb-3">
                              <label
                                  class="block uppercase text-xs font-bold mb-2"
                                  for="email"
                              >Email</label>
                              <input
                                  type="email"
                                  name="email"
                                  id="email"
                                  class="px-3 py-3 placeholder-gray-400 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full text-black"
                                  placeholder="Email"
                                  style="transition: all 0.15s ease 0s"
                                  required
                              />
                          </div>
                          <div class="relative w-full mb-3">
                              <label
                                  class="block uppercase text-xs font-bold mb-2"
                                  for="mensaje"
                              >Mensaje</label>
                              <textarea
                                  name="mensaje"
                                  id="mensaje"
                                  rows="4"
                                  class="px-3 py-3 placeholder-gray-400 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full text-black"
                                  placeholder="Escribe tu mensaje..."
                                  style="transition: all 0.15s ease 0s"
                                  required
                              ></textarea>
                          </div>
                          <div class="text-center mt-6">
                              <button
                                  class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                  type="submit"
                                  style="transition: all 0.15s ease 0s"
                              >
                                  Enviar
                              </button>
                          </div>
                      </form>
                      <!-- Fin del formulario -->
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>


      <section class="relative block py-24 lg:pt-0 ">
        <div
                  class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                  style="height: 80px; transform: translateZ(0px)"
                >
                  <svg
                    class="absolute bottom-0 overflow-hidden"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none"
                    version="1.1"
                    viewBox="0 0 2560 100"
                    x="0"
                    y="0"
                  >
                    <polygon
                      class="text-gray-900 fill-current"
                      points="2560 0 2560 100 0 100"
                    ></polygon>
                  </svg>
                </div>
      </section>

      <section class="call-to-action-box py-10 bg-gray-100 text-gray-900 mb-10">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center px-6">
            <div class="text-content">
                <p class="text-lg font-semibold text-white">¿Quieres saber mas sobre nuestros servicios y lo que ofrecemos ?</p>
            </div>
            <div class="button-content mt-4 md:mt-0">
                <a href="/servicios" class="cta-button">Nuestros Servicios</a>
            </div>
        </div>
    </section>
    

    <style>
        .separator-line {
            width: 90%; /* Ajusta el ancho de la línea */
            height: 2px; /* Grosor de la línea */
            margin: 20px auto; /* Centrar la línea y añadir separación */
            background: linear-gradient(to right, #ffffff, rgba(255, 255, 255, 0.1)); /* Gradiente */
            border: none;
        }
        .tarjeta-imagen {
            width: 100%; /* Asegura que ocupe todo el ancho disponible */
            height: 200px; /* Ajusta esta altura para que todas sean iguales */
            object-fit: cover; /* Asegura que las imágenes se recorten proporcionalmente */
        }
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
    border-top: 3px solid #ff5733; /* Línea superior de color */
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
