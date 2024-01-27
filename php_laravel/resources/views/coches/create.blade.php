@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Añadir Coche</h1>
        <form action="{{ route('coches.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="marca" class="form-label">Marca:</label>
                <input type="text" class="form-control" id="marca" name="marca" required>
            </div>

            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo:</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>

            <div class="mb-3">
                <label for="anio" class="form-label">Año:</label>
                <input type="number" class="form-control" id="anio" name="anio" required>
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Color:</label>
                <input type="text" class="form-control" id="color" name="color" required>
            </div>

            <div class="mb-3">
                <label for="id_propietario" class="form-label">Propietario:</label>
                <select class="form-select" id="id_propietario" name="id_propietario" required onchange="cargarCoches()">
                    <option value=""></option>
                    @foreach ($propietarios as $propietario)
                        <option value="{{ $propietario->id }}">{{ $propietario->nombre }} {{ $propietario->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Guardar Coche</button>
            <a href="{{ route('coches.index') }}" class="btn btn-danger">Cancelar</a>
        </form>

        <h2>Coches del propietario</h2>
        <ul id="listaCoches">
            @foreach ($coches as $coche)
                @if (count($coches) > 0)
                    @foreach ($coches as $coche)
                        <li>{{ $coche->marca }} {{ $coche->modelo }} ({{ $coche->anio }})</li>
                    @endforeach
                @else
                    <li>No hay coches registrados para este propietario.</li>
                @endif
            @endforeach

            {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}


            {{-- <script>
    
    var app = new Vue({
        el: '#app',
        data: {
            coches: []
        },
        methods: {
            cargarCoches: function () {
                const propietarioId = document.getElementById('id_propietario').value;

                axios.get('/coches/por-propietario/' + propietarioId)
                    .then(response => {
                        // Actualizar la lista de coches
                        this.coches = response.data.coches;
                    })
                    .catch(error => {
                        console.error('Error al cargar coches:', error);
                    });
            }
        }
    });
</script> --}}

            <script>
                function cargarCoches() {
                    const propietarioId = document.getElementById('id_propietario').value;

                    axios.get('/coches/por-propietario/' + propietarioId)
                        .then(function(response) {
                            console.log(response.data);

                            let listaCochesHTML = '';
                            response.data.coches.forEach(coche => {
                                listaCochesHTML += '<li>' + coche.marca + ' ' + coche.modelo + ' (' + coche.anio +
                                    ')</li>';
                            });

                            document.getElementById('listaCoches').innerHTML = listaCochesHTML;
                        })

                        .catch(function(error) {
                            console.error('Error al cargar coches:', error);
                        });
                }
            </script>
    </div>
@endsection
