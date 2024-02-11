@extends('layouts.app')
@section('content')
<div style="padding: 12px">
    <h3 style="font-weight: bold">Materias</h3>
    <a href="{{ route('materia.create') }}" class="btn btn-primary">Crear</a>
   @if ($materias->isNotEmpty())
   <div class="table-responsive-lg">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Codigo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
            <tbody>
                @foreach ($materias as $mat)
                <tr>
                    <td>{{ $mat->nombre }}</td>
                    <td>{{ $mat->codigo }}</td>
                    <td>{{ $mat->descripcion }}</td>
                    <td>
                        <div class="row-container">
                            <a href="{{ route('materia.edit', $mat->idmateria) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('materia.destroy', $mat->idmateria) }}" method="POST" style="margin: 0px">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>
   </div>
   @else
    <p>No hay materias</p>
   @endif
</div>
@if(session('success'))
<script>
    Swal.fire({
        title: 'Éxito',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'Aceptar'
    });
</script>
@endif

@if(session('error'))
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