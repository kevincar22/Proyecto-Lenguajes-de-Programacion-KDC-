@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div style="padding: 12px">
        <h3 style="font-weight: bold">Crear Profesor</h3>
        @include('shared._errors')
        @slot('header', 'Nueva Profesor')

        <form method="POST" action="{{route("profesor.store")}}">
            @include('profesor._fields')

            <div class="form-group d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Crear Profesor
                </button>
                <a href="{{ route('profesor.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Regresar al listado
                </a>
            </div>
        </form>
    </div>
</div>
@endsection