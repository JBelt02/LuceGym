<x-app-layout>
<div class="container">
    <h1>Crear Entrenador</h1>

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para crear entrenador -->
    <form action="{{ route('entrenadores.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nombre -->
        <div class="form-group">
            <label for="nombre">Nombre *</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Correo Electrónico *</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <!-- Contraseña -->
        <div class="form-group">
            <label for="password">Contraseña *</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <!-- Confirmar Contraseña -->
        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña *</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <!-- Teléfono -->
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
        </div>

        <!-- Dirección -->
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">
        </div>

        <!-- Fecha de Nacimiento -->
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}">
        </div>

        <!-- Especialidad -->
        <div class="form-group">
            <label for="especialidad">Especialidad *</label>
            <input type="text" name="especialidad" class="form-control" value="{{ old('especialidad') }}" required>
        </div>

        <!-- Imagen del Entrenador -->
        <div class="form-group">
            <label for="imagen_entrenador">Imagen del Entrenador</label>
            <input type="file" name="imagen_entrenador" class="form-control-file">
        </div>

        <!-- Botón de Envío -->
        <button type="submit" class="btn btn-primary">Crear Entrenador</button>
    </form>
</div>
</x-app-layout>