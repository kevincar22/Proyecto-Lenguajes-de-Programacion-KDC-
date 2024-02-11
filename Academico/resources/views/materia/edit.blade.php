@extends('layouts.app')
@section('content')
    <div style="padding: 12px">
        <h3 style="font-weight: bold">Editar Materia</h3>
        @include('shared._errors')
        @slot('header', 'Editar usuario')

        <form method="POST" action="{{ url("materias/{$materia->idmateria}") }}">
            {{ method_field('PUT') }}

            @include('materia._fields')

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Actualizar materia</button>
                <a href="{{ route('materia.index') }}" class="btn btn-primary">
                    Regresar al listado
                </a>
            </div>

        </form>
    </div>
@endsection
