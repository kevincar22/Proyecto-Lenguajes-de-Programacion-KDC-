@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-3">
      <a href="{{ route('materia.index') }}" class="card mb-4 shadow-sm custom-card">
        <div class="card-body text-center">
          <i class="fas fa-book fa-3x icono-gris"></i>
          <h5 class="card-title mt-3 letra-gris">{{ __('Materias') }}</h5>
        </div>
      </a>
    </div>
    <div class="col-md-3">
      <a href="{{ route('profesor.index') }}" class="card mb-4 shadow-sm custom-card">
        <div class="card-body text-center">
          <i class="fas fa-chalkboard-teacher fa-3x icono-gris"></i>
          <h5 class="card-title mt-3 letra-gris">{{ __('Profesor') }}</h5>
        </div>
      </a>
    </div>
    <div class="col-md-3">
      <a href="{{ route('Aulas.index') }}" class="card mb-4 shadow-sm custom-card">
        <div class="card-body text-center">
          <i class="fas fa-school fa-3x icono-gris"></i>
          <h5 class="card-title mt-3 letra-gris">{{ __('Aulas') }}</h5>
        </div>
      </a>
    </div>
    <div class="col-md-3">
      <a href="/registros" class="card mb-4 shadow-sm custom-card">
        <div class="card-body text-center">
          <i class="fas fa-clipboard-list fa-3x icono-gris"></i>
          <h5 class="card-title mt-3 letra-gris">Registros</h5>
        </div>
      </a>
    </div>
  </div>
</div>
@endsection
