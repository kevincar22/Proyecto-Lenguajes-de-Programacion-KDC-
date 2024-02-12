@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row">
    @php
      $cards = [
        ['route' => 'materia.index', 'icon' => 'fas fa-book', 'title' => 'Materias'],
        ['route' => 'profesor.index', 'icon' => 'fas fa-chalkboard-teacher', 'title' => 'Profesores'],
        ['route' => 'Aulas.index', 'icon' => 'fas fa-school', 'title' => 'Aulas'],
        //['route' => 'registros.index', 'icon' => 'fas fa-clipboard-list', 'title' => 'Registros']
      ];
    @endphp

    @foreach ($cards as $card)
      <div class="col-md-4">
        <a href="{{ route($card['route']) }}" class="card mb-3 shadow-sm" style="background-color: #404b59; color: #ffffff;">
          <div class="card-body text-center">
            <i class="{{ $card['icon'] }} fa-3x" style="color: #ffffff;"></i>
            <h5 class="card-title mt-3">{{ __($card['title']) }}</h5>
          </div>
        </a>
      </div>
    @endforeach
  </div>
</div>
@endsection

<style>
  .card:hover {
    background-color: #262e35;
    transition: background-color 0.3s ease;
  }

  .card:hover .fa-3x {
    color: #ffffff;
    transition: color 0.3s ease;
  }
</style>
