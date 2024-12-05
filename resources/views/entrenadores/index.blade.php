<x-app-layout>
    <div class="nine">
        <h1 class="text-white text-4xl font-bold mt-10 mb-10 pl-5 text-center">Entrenadores<span>Nuestro Equipo de Profesionales</span></h1>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-5 mb-10">
        @foreach($entrenadores as $entrenador)
        <div class="container">
            <div class="person-card">
                <!-- Imagen del entrenador -->
                <div class="person-card-photo">
                    @if($entrenador->imagen_entrenador)
                        <img src="{{ asset('storage/' . $entrenador->imagen_entrenador) }}" alt="{{ $entrenador->nombre }}">
                    @else
                        <img src="{{ asset('images/default-user.jpg') }}" alt="{{ $entrenador->nombre }}">
                    @endif
                </div>
                <!-- Información del entrenador -->
                <div class="person-card-info">
                    <h2>{{ $entrenador->nombre }}</h2>
                    <p>{{ $entrenador->especialidad }}</p>
                </div>
                <!-- Botones de acción (solo para admins) -->
                @if (auth()->check() && auth()->user()->rol === 'admin')
                <div class="flex justify-between space-x-2 m-4">
                    <a href="{{ route('entrenadores.edit', $entrenador->id) }}" class="flex-grow text-center bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition-colors">
                        Editar
                    </a>
                    <form action="{{ route('entrenadores.destroy', $entrenador->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este entrenador?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex-grow text-center bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition-colors">
                            Eliminar
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700,800,900');

        body {
            background-color: #2C3A47;
            color: #fff;
            font-family: 'Montserrat';
        }

        .container {
            height: 100%;
            display: flex;
        }

        .person-card {
            &:hover {
                cursor: pointer;
                transform: translateY(-10px);
                box-shadow: 15px 15px 5px #111;
                & .person-card-photo {
                    padding: 4px;
                    border: 4px solid #fff;
                    transform: translateY(-1rem);
                }
            }
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: auto;
            width: 18.75rem;
            border-radius: 5px;
            background-color: #1e2a38;
            transition: all 0.4s;
        }

        .person-card-photo {
            box-sizing: border-box;
            border: 0px solid #182028;
            padding: 0;
            overflow: hidden;
            height: 25rem;
            width: 20.75rem;
            transition: all 0.4s;
        }

        .person-card-photo > img {
            height: 25rem;
            position: relative;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            object-fit: cover;
        }

        .person-card-info {
            padding: 1.5rem;
            text-align: center;
        }

        .person-card-info h2 {
            font-size: 1.5rem;
            color: #fff;
        }

        .person-card-info p {
            font-size: 1rem;
            color: #aaa;
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
