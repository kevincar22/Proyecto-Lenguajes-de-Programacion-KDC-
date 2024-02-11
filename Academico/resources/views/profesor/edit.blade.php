@extends('layouts.app')
@section('content')
<div style="padding: 12px">
    <h3 style="font-weight: bold">Editar Profesor</h3>
    @include('shared._errors')
    @slot('header', 'Editar Profesor')

    <form method="POST" action="{{route('profesor.update', $profesor->idprofesor)}}">
        {{method_field('PUT')}}

        @include('profesor._fields')

        <div class="form-group">
            <button
                type="submit" class="btn btn-primary"
            >Actualizar profesor</button>
            <a href="{{ route('profesor.index') }}" class="btn btn-primary">
                Regresar al listado
            </a>
        </div>

    </form>
</div>
@endsection