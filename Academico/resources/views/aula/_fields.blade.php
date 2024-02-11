{{ csrf_field() }}

<div class="form-group">
    <label for="codigo" style="font-weight: bold">Codigo</label>
    <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo',$aula->codigo) }}"> 
</div>

<div class="form-group">
    <label for="idasignatura"  style="font-weight: bold">IdAsignatura</label>
    <input type="number" class="form-control" id="idasignatura" name="idasignatura" value="{{ old('idasignatura',$aula->idasignatura) }}"> 
</div>

<div class="form-group">
    <label for="idprofesor" style="font-weight: bold">IdProfesor</label>
    <input type="number" class="form-control" id="idprofesor" name="idprofesor" value="{{ old('idprofesor',$aula->idprofesor) }}"> 
</div>

