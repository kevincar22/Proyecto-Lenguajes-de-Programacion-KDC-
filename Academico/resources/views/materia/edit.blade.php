@vite(['resources/sass/app.scss', 'resources/js/app.js'])


<div>
    @include('shared._errors')
    @slot('header', 'Editar usuario')

    <form method="POST" action="{{url("materias/{$materia->idmateria}")}}">
        {{method_field('PUT')}}

        @include('materia._fields')

        <div class="form-group">
            <button
                type="submit" class="btn btn-primary"
            >Actualizar materia</button>
            <a href="{{ route('materia.index') }}" class="btn btn-link">
                Regresar al listado
            </a>
        </div>

    </form>
</div>