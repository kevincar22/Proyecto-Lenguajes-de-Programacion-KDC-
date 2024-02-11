@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div style="padding: 12px">
            <h3 style="font-weight: bold">Aulas</h3>
            <a href="{{ route('Aulas.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
            @if ($aulas->isNotEmpty())
                <div class="table-responsive-lg">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Profesor</th>
                                <th scope="col">Materia</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aulas as $al)
                                <tr>
                                    <td>{{ $al->codigo }}</td>
                                    <td>{{ $al->profesor->nombre ?? 'Sin Profesor' }}</td>
                                    <td>{{ $al->materia->nombre ?? 'Sin Materia' }}</td>

                                    <td>
                                        <div class="row-container" style="display: flex">
                                            <a href="{{ route('Aulas.edit', $al->idaula) }}" class="btn btn-primary"><i
                                                    class="fas fa-edit"></i></a>
                                            <form action="{{ route('Aulas.destroy', $al->idaula) }}" method="POST"
                                                style="margin: 0px">
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
                <p>No hay Aulas</p>
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
