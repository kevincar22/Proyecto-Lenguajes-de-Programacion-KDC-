@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card" style="background-color: #404b59; color: #ffffff;">
        <div class="card-header" style="background-color: #262e35;">
            <h3 class="fw-bold">Editar Profesor</h3>
        </div>
        <div class="card-body">
            @include('shared._errors')

            <form method="POST" action="{{ url("Profesores/{$profesor->idprofesor}") }}">
                @csrf
                @method('PUT')

                @include('profesor._fields')

                <div class="form-group d-flex justify-content-between mt-4">
                    <button type="submit" class="btn" style="background-color: #576673; color: #ffffff;">
                        <i class="fas fa-save"></i> Actualizar Profesor
                    </button>
                    <a href="{{ route('profesor.index') }}" class="btn btn-outline-light">
                        <i class="fas fa-arrow-left"></i> Regresar al listado
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
