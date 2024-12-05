<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 bg-gray-800 text-white rounded-lg shadow-lg mt-10 mb-10">
        <div class="nine">
            <h1 class="text-white text-4xl font-bold  mb-10 pl-5 text-center">Clases<span>Todas Nuestras Clases Disponibles</span></h1>
        </div>

        <!-- Mensaje de Éxito -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Botón para crear una nueva clase -->
        @if (auth()->check() && auth()->user()->rol === 'admin')
            <div class="mb-6 text-center">
                <a href="{{ route('clases.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring focus:ring-blue-500">
                    Crear Nueva Clase
                </a>
            </div>
        @endif

        <!-- Tarjetas con animación -->
        <div class="wrapper">
            <div class="cards">
                @php
                    // Lista de imágenes de stock
                    $imagenesStock = [
                        asset('images/stock1.jpg'),
                        asset('images/stock2.jpg'),
                        asset('images/stock3.jpg'),
                        asset('images/stock4.jpg'),
                        asset('images/stock5.jpg'),
                        asset('images/stock6.jpg'),
                    ];
                @endphp

                @foreach ($clases as $index => $clase)
                    <figure class="card">
                        <!-- Imagen -->
                        <img src="{{ $imagenesStock[$index % count($imagenesStock)] }}" alt="{{ $clase->nombre }}" />

                        <!-- Contenido -->
                        <figcaption>
                            <h2>{{ $clase->nombre }}</h2>
                            <div class="description">
                                <p>{{ $clase->descripcion }}</p>
                                <p><Strong>Duración:</Strong> {{ $clase->duracion }} minutos</p>
                                @if (auth()->check() && auth()->user()->rol === 'admin')
                                    <div class="actions">
                                        <a href="{{ route('clases.edit', $clase->id) }}" class="text-blue-400 hover:text-blue-600">Editar</a>
                                        <form action="{{ route('clases.destroy', $clase->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-600" onclick="return confirm('¿Estás seguro de que deseas eliminar esta clase?')">Eliminar</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </div>
    

    <style>
    .wrapper {
        padding: 15px;
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* 3 tarjetas por fila */
        gap: 25px; /* Más espacio entre las tarjetas */
        justify-items: center;
    }

    .card {
        position: relative;
        width: 350px; /* Aumenta el ancho */
        height: 450px; /* Aumenta el alto */
        overflow: hidden;
        border-radius: 15px; /* Bordes más redondeados */
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.7);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #24282f; /* Fondo para que la transición no sea transparente */
    }

    .card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card figcaption {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.8); /* Fondo más opaco para mayor contraste */
        color: white;
        padding: 20px; /* Espaciado interno */
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .card figcaption h2 {
        font-size: 24px; /* Tamaño del título mayor */
        margin: 0;
        font-weight: bold;
        text-align: center;
        margin-bottom: 10px; /* Espacio inferior */
    }

    .card figcaption .description {
        display: none; /* Ocultar inicialmente */
        opacity: 0;
        transform: translateY(10px);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px) scale(1.05);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.8);
    }

    .card:hover figcaption {
        transform: translateY(-70px); /* Mover el título hacia arriba */
    }

    .card:hover figcaption .description {
        display: block; /* Mostrar descripción */
        opacity: 1;
        transform: translateY(0);
    }

    .card figcaption .description p {
        margin: 10px 0; /* Más espacio entre líneas */
        color: #d1d5db;
        font-size: 16px; /* Tamaño más grande */
    }

    .card figcaption .actions {
        margin-top: 15px;
        display: flex;
        justify-content: space-around;
    }

    .card figcaption .actions a,
    .card figcaption .actions button {
        background: none;
        border: none;
        color: #4fc3f7;
        cursor: pointer;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
        padding: 5px 10px; /* Más espacio para los botones */
        border-radius: 5px;
        transition: background-color 0.2s ease;
    }

    .card figcaption .actions button:hover,
    .card figcaption .actions a:hover {
        color: white;
        background-color: #29b6f6;
    }
    .nine h1 {
            text-align: center;
            font-size: 50px;
            text-transform: uppercase;
            color: #ffffff;
            letter-spacing: 1px;
            font-family: "Playfair Display", serif;
            font-weight: 400;
        }

        .nine h1 span {
            margin-top: 5px;
            font-size: 15px;
            color: #bbb0b0;
            word-spacing: 1px;
            font-weight: normal;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-family: "Raleway", sans-serif;
            font-weight: 500;

            display: grid;
            grid-template-columns: 1fr max-content 1fr;
            grid-template-rows: 27px 0;
            grid-gap: 20px;
            align-items: center;
        }

        .nine h1 span:after,
        .nine h1 span:before {
            content: " ";
            display: block;
            border-bottom: 1px solid #bbb0b0;
            border-top: 1px solid #bbb0b0;
            height: 5px;
            background-color: #bbb0b0;
            width: 100%;
        }
</style>

</x-app-layout>
