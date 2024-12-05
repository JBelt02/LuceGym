<x-app-layout>
    <div class="nine">
        <h1 class="text-white text-4xl font-bold mt-10 mb-10 pl-5 text-center">Horarios<span>Disponibles o Reservados</span></h1>
    </div>
    @if (auth()->check() && auth()->user()->rol === 'admin')
        <div class="mb-4 pl-5">
            <a href="{{ route('horarios.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Crear
            </a>
        </div>
    @endif
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10 mb-20">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Fecha</th>
                    <th scope="col" class="px-6 py-3">Hora Inicio</th>
                    <th scope="col" class="px-6 py-3">Hora Fin</th>
                    <th scope="col" class="px-6 py-3">Duración</th>
                    <th scope="col" class="px-6 py-3">Entrenador</th>
                    <th scope="col" class="px-6 py-3">Clase</th>
                    <th scope="col" class="px-6 py-3"><span>Acciones</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horarios as $horario)
                    @php
                        $horaInicio = \Carbon\Carbon::createFromFormat('H:i:s', $horario->hora_inicio);
                        $horaFin = \Carbon\Carbon::createFromFormat('H:i:s', $horario->hora_fin);
                        $duracion = $horaFin->diff($horaInicio)->format('%H:%I:%S');
                        $yaReservado = auth()->check() && $horario->reservas()->where('usuario_id', auth()->id())->exists();
                    @endphp
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $horario->fecha }}</td>
                        <td class="px-6 py-4">{{ $horario->hora_inicio }}</td>
                        <td class="px-6 py-4">{{ $horario->hora_fin }}</td>
                        <td class="px-6 py-4">{{ $duracion }}</td>
                        <td class="px-6 py-4">{{ $horario->usuario->nombre }}</td>
                        <td class="px-6 py-4">{{ $horario->clase->nombre }}</td>

                        <td class="px-6 py-4 text-center flex justify-center space-x-4">
                            @if (!$yaReservado)
                                <form action="{{ route('reservas.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="horario_id" value="{{ $horario->id }}">
                                    <input type="hidden" name="fecha_reserva" value="{{ $horario->fecha }}">
                                    <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Reservar</button>
                                </form>
                            @else
                                <div class="flex space-x-4">
                                    <span class="text-green-500">Reservado</span>
                                    <form action="{{ route('reservas.destroy', $horario->reservas()->where('usuario_id', auth()->id())->first()->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('¿Deseas eliminar tu reserva?')">Eliminar Reserva</button>
                                    </form>
                                </div>
                            @endif

                            @if (auth()->check() && auth()->user()->rol === 'admin')
                                <a href="{{ route('horarios.edit', $horario->id) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Editar</a>
                                <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('¿Estás seguro de que deseas eliminar este horario?')">Eliminar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        /* Style 9 */
        .nine h1 {
            text-align: center;
            font-size: 50px;
            text-transform: uppercase;
            color: #ffffff;
            letter-spacing: 1px;
            font-family: "Playfair Display", serif;
            font-weight: 400;
            margin-right: 20px;
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
