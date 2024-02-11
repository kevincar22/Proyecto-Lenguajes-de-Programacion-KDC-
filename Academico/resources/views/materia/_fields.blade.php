{{ csrf_field() }}

<div class="form-group">
    <label for="nombre"  style="font-weight: bold">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre',$materia->nombre) }}"> 
</div>

<div class="form-group">
    <label for="descripcion" style="font-weight: bold">Descripcion</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion',$materia->descripcion) }}"> 
</div>

<div class="form-group">
    <label for="codigo" style="font-weight: bold">Codigo</label>
    <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo',$materia->codigo) }}"> 
</div>
