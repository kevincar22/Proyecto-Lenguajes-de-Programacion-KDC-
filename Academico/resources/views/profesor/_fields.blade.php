{{ csrf_field() }}

<div class="form-group">
    <label for="cedula" style="font-weight: bold">Cedula</label>
    <input type="text" class="form-control" id="cedula" name="cedula" value="{{ old('cedula',$profesor->cedula) }}"> 
</div>

<div class="form-group">
    <label for="nombre" style="font-weight: bold">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre',$profesor->nombre) }}"> 
</div>

<div class="form-group">
    <label for="idasignatura" style="font-weight: bold">Materia</label>
    <select class="form-control" id="idasignatura" name="idasignatura">
        @foreach ($materias as $materia)
            <option value="{{ $materia->idmateria }}" 
                {{ old('idasignatura', isset($profesor) ? $profesor->idasignatura : null) == $materia->idmateria ? 'selected' : '' }}>
                {{ $materia->nombre }}
            </option>
        @endforeach
    </select>
</div>