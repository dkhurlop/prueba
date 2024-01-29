@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Añadir Propietario</h1>

        <form action="{{ route('propietarios.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>

            <button type="submit" class="btn btn-success">Guardar Propietario</button>
            <a href="{{ route('propietarios.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
@endsection
