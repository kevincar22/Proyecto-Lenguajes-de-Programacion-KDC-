{{ csrf_field() }}

<div class="form-group">
    <label for="codigo" style="font-weight: bold">Codigo</label>
    <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo',$aula->codigo) }}"> 
</div>

<div class="form-group">
    <label for="idasignatura" style="font-weight: bold">Materia</label>
    <select class="form-control" id="idasignatura" name="idasignatura">
        @foreach ($materias as $materia)
            <option value="{{ $materia->idmateria }}" 
                {{ old('idasignatura', isset($aula) ? $aula->idasignatura : null) == $materia->idmateria ? 'selected' : '' }}>
                {{ $materia->nombre }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="idprofesor" style="font-weight: bold">Profesor</label>
    <select class="form-control" id="idprofesor" name="idprofesor">
        @foreach ($profesores as $pf)
            <option value="{{ $pf->idprofesor }}" 
                {{ old('idprofesor', isset($aula) ? $aula->idprofesor : null) == $pf->idprofesor ? 'selected' : '' }}>
                {{ $pf->nombre }}
            </option>
        @endforeach
    </select>
</div>