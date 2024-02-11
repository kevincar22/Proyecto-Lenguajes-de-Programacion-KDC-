@extends('layouts.app')
@section('content')
<div style="padding: 12px">
    <h3 style="font-weight: bold">Crear Materia</h3>
    @include('shared._errors')
    @slot('header', 'Nueva Materia')

    <form method="POST" action="{{url("materias")}}">

        @include('materia._fields')

        <div class="form-group">
            <button
                type="submit" class="btn btn-primary"
            >Crear materia</button>
            <a href="{{ route('materia.index') }}" class="btn btn-primary">
                Regresar al listado
            </a>
        </div>

    </form>
</div>
@endsection