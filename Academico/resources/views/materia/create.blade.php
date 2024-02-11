@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div style="padding: 12px">
        <h3 style="font-weight: bold">Crear Materia</h3>
        @include('shared._errors')
        @slot('header', 'Nueva Materia')

        <form method="POST" action="{{url("materias")}}">
            @include('materia._fields')

            <div class="form-group d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Crear materia
                </button>
                <a href="{{ route('materia.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Regresar al listado
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
