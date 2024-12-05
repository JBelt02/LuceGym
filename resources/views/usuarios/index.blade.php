<x-app-layout>
    <div class="nine">
        <h1 class="text-white text-4xl font-bold mt-10 mb-10 pl-5 text-center">Gestión Usuarios<span>Tanto Clientes como Entrenadores</span></h1>
    </div>

    @if (auth()->check() && auth()->user()->rol === 'admin')
        <div class="mb-4 pl-5">
            <a href="{{ route('usuarios.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Crear Usuario
            </a>
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10 mb-20">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Teléfono</th>
                    <th class="px-6 py-3">Dirección</th>
                    <th class="px-6 py-3">Tipo de Usuario</th>
                    <th class="px-6 py-3"><span>Acciones</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 text-gray-900 dark:text-white">{{ $usuario->nombre }}</td>
                        <td class="px-6 py-4">{{ $usuario->email }}</td>
                        <td class="px-6 py-4">{{ $usuario->telefono }}</td>
                        <td class="px-6 py-4">{{ $usuario->direccion }}</td>
                        <td class="px-6 py-4">
                            {{ $usuario->tipo_usuario === 'entrenador' ? 'Entrenador' : 'Cliente' }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Editar</a>
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
 
     </style>
</x-app-layout>
