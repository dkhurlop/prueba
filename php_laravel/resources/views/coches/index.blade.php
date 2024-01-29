@extends('layouts.app')

@section('content')
    <div class="table-responsive">
        <a href="{{ route('coches.create') }}" class="btn btn-success">Añadir Coche</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Año</th>
                    <th scope="col">Color</th>
                    <th scope="col">Propietario</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coches as $coche)
                    <tr>
                        <td>{{ $coche->id }}</td>
                        <td>{{ $coche->marca }}</td>
                        <td>{{ $coche->modelo }}</td>
                        <td>{{ $coche->anio }}</td>
                        <td>{{ $coche->color }}</td>
                        <td>{{ $coche->propietario->nombre }} {{ $coche->propietario->apellido }}</td>
                        <td>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $coche->id }}">
                                Editar
                            </button>

                            <form id="deleteForm{{ $coche->id }}" action="{{ route('coches.destroy', $coche->id) }}"
                                method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $coche->id }}">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    <div class="modal fade" id="deleteModal{{ $coche->id }}" tabindex="-1"
                        aria-labelledby="deleteModalLabel{{ $coche->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $coche->id }}">Confirmar eliminación
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar este coche?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" form="deleteForm{{ $coche->id }}"
                                        class="btn btn-danger">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>



    @include('coches.edit')
@endsection
