@extends('layouts.app')

@section('content')
    <div class="table-responsive">
        <a href="{{ route('propietarios.create') }}" class="btn btn-success">Añadir Propietario</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($propietarios as $propietario)
                    <tr>
                        <td>{{ $propietario->nombre }}</td>
                        <td>{{ $propietario->apellido }}</td>
                        <td>{{ $propietario->email }}</td>
                        <td>{{ $propietario->telefono }}</td>
                        <td>
                            <form id="deleteForm{{ $propietario->id }}"
                                action="{{ route('propietarios.destroy', $propietario->id) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $propietario->id }}">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    <div class="modal fade" id="deleteModal{{ $propietario->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $propietario->id }}">Confirmar
                                        eliminación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar a {{ $propietario->nombre }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" form="deleteForm{{ $propietario->id }}"
                                        class="btn btn-danger">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
