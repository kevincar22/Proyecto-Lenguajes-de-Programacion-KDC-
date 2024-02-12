@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold" style="color: #404b59;">Profesores</h3>
            <a href="{{ route('profesor.create') }}" class="btn" style="background-color: #576673; color: #ffffff;"><i
                    class="fas fa-plus me-2"></i>Añadir Profesor</a>
        </div>

        @if ($profesores->isNotEmpty())
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($profesores as $pf)
                    <div class="col">
                        <div class="card h-100 shadow-sm" style="background-color: #404b59; color: #ffffff;">
                            <div class="card-header" style="background-color: #262e35; color: #ffffff;">
                                <h5 class="card-title mb-0">{{ $pf->nombre }}</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><strong>Cédula:</strong> {{ $pf->cedula }}</p>
                                <p class="card-text"><strong>Materia:</strong> {{ $pf->materia->nombre ?? 'Sin materia' }}
                                </p>
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="{{ route('profesor.edit', $pf->idprofesor) }}"
                                    class="btn btn-outline-light btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('profesor.destroy', $pf->idprofesor) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de querer eliminar este profesor?');"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info" role="alert">
                No hay profesores registrados.
            </div>
        @endif
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Éxito',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#576673',
                confirmButtonText: 'Aceptar',
                customClass: {
                    popup: 'swal-wide',
                    title: 'swal-title-success',
                    content: 'swal-text-success'
                },
                buttonsStyling: true,
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonColor: '#576673',
                confirmButtonText: 'Aceptar',
                customClass: {
                    popup: 'swal-wide',
                    title: 'swal-title-error',
                    content: 'swal-text-error'
                },
                buttonsStyling: true,
            });
        </script>
    @endif
@endsection
