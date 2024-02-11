@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div style="padding: 12px">
            <h3 style="font-weight: bold">Profesores</h3>
            <a href="{{ route('Profesor.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
            @if ($profesores->isNotEmpty())
                <div class="table-responsive-lg">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Materia</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profesores as $pf)
                                <tr>
                                    <td>{{ $pf->nombre }}</td>
                                    <td>{{ $pf->cedula }}</td>
                                    <td>{{ $pf->materia->nombre ?? 'Sin materia' }}</td> {{-- Asegúrate de que cada profesor tenga una materia asociada para evitar errores --}}
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('Profesor.edit', $pf->idprofesor) }}"
                                                class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('Profesor.destroy', $pf->idprofesor) }}" method="POST"
                                                onsubmit="return confirm('¿Estás seguro de querer eliminar este profesor?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>No hay materias registradas.</p>
            @endif
        </div>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Éxito',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
@endsection
