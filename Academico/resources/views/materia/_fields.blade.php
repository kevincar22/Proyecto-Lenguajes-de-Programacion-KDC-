{{ csrf_field() }}

<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre',$materia->nombre) }}"> 
</div>

<div class="form-group">
    <label for="descripcion">Descripcion</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion',$materia->descripcion) }}"> 
</div>

<div class="form-group">
    <label for="codigo">Codigo</label>
    <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo',$materia->codigo) }}"> 
</div>
