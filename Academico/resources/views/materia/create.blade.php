@vite(['resources/sass/app.scss', 'resources/js/app.js'])


<div>
    @include('shared._errors')
    @slot('header', 'Nueva Materia')

    <form method="POST" action="{{url("materias")}}">

        @include('materia._fields')

        <div class="form-group">
            <button
                type="submit" class="btn btn-primary"
            >Crear materia</button>
            <a href="{{ route('materia.index') }}" class="btn btn-link">
                Regresar al listado
            </a>
        </div>

    </form>
</div>