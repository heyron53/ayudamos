@extends('plantillabase')
@section('contenido')


<div class="row alert">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Asignaturas</h5>
        <p class="card-text">Listar de asignaturas junto a información detallada.</p>
        <a href="listadoAsignaturas" class="btn btn-primary">Listar</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cursos</h5>
        <p class="card-text">Listado de cursos junto a información detallada.</p>
        <a href="listadoCursos" class="btn btn-primary">Listar</a>
      </div>
    </div>
  </div>
</div>
@endsection