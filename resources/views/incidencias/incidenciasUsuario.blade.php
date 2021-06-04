@extends('plantillabase')
@section('contenido')

<div class="container alert">
      <h1>INCIDENCIAS</h1>
      <ul class="nav nav-tabs">
            <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="listarIncidencias">Todas</a>
            </li>
            <li class="nav-item">
                  <form action="listarIncidenciasUsuario" method="POST">
                        @csrf
                        @method('POST')
                        <input type="submit" class="btn btn-link nav-link active" aria-current="page" name="enviar" value="Listar asignadas">
                  </form>
            </li>
            <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="incidenciasNoAsignadas">No asignadas</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="incidenciasAbiertas">Incidencias abiertas</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="incidenciasCerradas">Incidencias cerradas</a>
            </li>
      </ul>

      <div class="row alert">
      <div class="table-responsive">
            <table class="table table-bordered bg-white text-dark col-md-10" id="myTable">
                        
                  <thead>
                        <tr>
                              <th>CODIGO</th>
                              <th>USUARIO</th>
                              <th>TITULO</th>
                              <th>CREACIÓN</th>
                              <th>CIERRE</th>
                              <th>ASIGNADO</th>
                              <th>ESTADO</th>
                              <th></th>
                        </tr>
                  </thead>
                  <tbody>
                        @forelse ($incidencias as $incidencia)
                        <tr>
                        <td>{{ $incidencia->codInci }}</td>
                        <td>{{ $incidencia->codUsu }}</td>
                        <td>{{ $incidencia->titulo }}</td>
                        <td>{{ $incidencia->fechaCreacion }}</td>
                        <td>{{ $incidencia->fechaCierre }}</td>
                        <td>{{ $incidencia->codUsuAsignado }}</td>
                        <td>{{ $incidencia->estado }}</td>
                        <td>
                              <form action="cerrarIncidencia" method="POST">
                              @csrf
                              @method('POST')
                                    <input type="hidden" name="codInci" value="{{ $incidencia->codInci }}">
                                    <input type="submit" class="btn btn-primary" name="enviar" value="Cerrar">
                              </form>
                        </td>
                        </tr>
                        @empty
                        <tr>
                              <td colspan=8>No se han encontrado consultas</td>
                        </tr> 
                        @endforelse
                  </tbody>
            </table>
      </div>
    </div>
</div>
@endsection