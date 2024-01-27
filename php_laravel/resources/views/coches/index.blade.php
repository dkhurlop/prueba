@extends('layouts.app')

@section('content')
    <div class="table-responsive">
        <a href="{{ route('coches.create') }}" class="btn btn-success">Añadir Coche</a>
        <table class="table bg-dark text-white">
            <thead class="">
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
                @foreach($coches as $coche)
                    <tr>
                        <td>{{ $coche->id }}</td>
                        <td>{{ $coche->marca }}</td>
                        <td>{{ $coche->modelo }}</td>
                        <td>{{ $coche->anio }}</td>
                        <td>{{ $coche->color }}</td>
                        <td>{{ $coche->propietario->nombre }} {{ $coche->propietario->apellido }}</td>
                        <td>
                            
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $coche->id }}">
                                Editar
                            </button>
                            
                            <form action="{{ route('coches.destroy', $coche->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('coches.edit')
    {{-- @foreach($coches as $coche)
        <div class="modal fade" id="editModal{{ $coche->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $coche->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $coche->id }}">Editar Coche</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <form action="{{ route('coches.update', $coche->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="marca" class="form-label">Marca:</label>
                                <input type="text" class="form-control" id="marca" name="marca" value="{{ $coche->marca }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="modelo" class="form-label">Modelo:</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $coche->modelo }}" required>
                            </div>

                            <div> class="mb-3">
                                <label for="anio" class="form-label">Año:</label>
                                <input type="text" class="form-control" id="anio" name="anio" value="{{ $coche->anio }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="color" class="form-label">Color:</label>
                                <input type="text" class="form-control" id="color" name="color" value="{{ $coche->color }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="id_propietario" class="form-label">Propietario:</label>
                                <select class="form-select" id="id_propietario" name="id_propietario" required>
                                    @foreach($propietarios as $propietario)
                                        <option value="{{ $propietario->id }}" @if($coche->id_propietario == $propietario->id) selected @endif>{{ $propietario->nombre }} {{ $propietario->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}
@endsection
