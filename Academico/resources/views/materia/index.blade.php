@extends('layouts.app')


<div>
   @if ($materias->isNotEmpty())
   <div class="table-responsive-lg">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Codigo</th>
                <th scope="col">Descripcion</th>
            </tr>
        </thead>
            <tbody>
                @foreach ($materias as $materia)
                <tr>
                    <td>{{ $materia->nombre }}</td>
                    <td>{{ $materia->codigo }}</td>
                    <td>{{ $materia->descripcion }}</td>
                </tr>
                @endforeach
            </tbody>
    </table>
   </div>
   @else
    <p>No hay materias</p>
   @endif
</div>