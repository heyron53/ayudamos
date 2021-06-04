@extends('plantillabase')
@section('contenido')


<div class="container alert">
      <h1>BANEOS</h1>
    <ul class="nav nav-tabs">
    <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="listarUsuarios">Listar usuarios</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="listarDenuncias">Listar denuncias</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="listarBaneos">Listar baneos</a>
            </li>
    </ul>

    <div class="row alert">
    <div class="table-responsive">
            <table class="table table-bordered bg-white text-dark table stacktable" id="myTable">
                  <thead>
                        <tr>
                              <th scope="col">CodBan</th>
                              <th scope="col">CodUsuBan</th>
                              <th scope="col">TipoBaneo</th>
                              <th scope="col">Mensaje</th>
                              <th scope="col">FechaInicio</th>
                              <th scope="col">FechaFin</th>
                              <th scope="col"></th>
                        </tr>
                  </thead>
                  <tbody>
                        @forelse ($baneos as $baneo)
                        <tr>
                              <td>{{ $baneo->codBan }}</td>
                              <td>{{ $baneo->codUsuBan }}</td>
                              <td>{{ $baneo->tipoBaneo }}</td>
                              <td>{{ $baneo->mensaje }}</td>
                              <td>{{ $baneo->fechaInicio }}</td>
                              <td>{{ $baneo->fechaFin }}</td>
                              <td>
                              <form action="eliminarBaneo" method="POST">
                              @csrf
                              @method('POST')
                                    <input type="hidden" name="codBan" value="{{ $baneo->codBan }}">
                                    <input type="submit" class="btn btn-primary" value="Desbanear">
                              </form>
                        </tr>
                        @empty
                        </tr>
                              <td colspan=7>No se han encontrado denuncias</td>
                        <tr>
                        @endforelse
                  
                  </tbody>

            </table>
      </div>
      </div>


@endsection