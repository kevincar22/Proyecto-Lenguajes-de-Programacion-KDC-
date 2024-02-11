@extends('layouts.app')
@section('content')
<div style="padding: 12px">
    <h3 style="font-weight: bold">Editar Aula</h3>
    @include('shared._errors')
    @slot('header', 'Editar Aula')

    <form method="POST" action="{{ url( "Aulas/{$aula->idaula}") }}"> <!--route('Aulas.update', $aula->idaula)-->
        {{ method_field('PUT') }}

        @include('aula._fields')

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar Aula</button>
            <a href="{{ route('Aulas.index') }}" class="btn btn-primary">
                Regresar al listado
            </a>
        </div>

    </form>
</div>
@endsection