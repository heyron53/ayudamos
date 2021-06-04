@extends('plantillabase')
@section('contenido')


<div class="container alert">
      <h1>DENUNCIAS</h1>
    <ul class="nav nav-tabs">
    <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="listarUsuarios">Listar usuarios</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="listarDenuncias">Listar denuncias</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="listarBaneos">Listar baneos</a>
            </li>
    </ul>

    <div class="row alert">
      <div class="table-responsive">
            <table class="table table-bordered bg-white text-dark table stacktable" id="myTable">
                  <thead>
                        <tr>
                              <th scope="col">CodDenuncia</th>
                              <th scope="col">FechaCreacion</th>
                              <th scope="col">TipoDenuncia</th>
                        </tr>
                  </thead>
                  <tbody>
                        @forelse ($denuncias as $denuncia)
                        <tr>
                              <td>
                              <form action="listarContenidoDenuncia" method="POST">
                              @csrf
                              @method('POST') 
                                    <input type="hidden" name="codDenuncia" value="{{ $denuncia->codDenuncia }}">
                                    <input type="submit" class="btn btn-link" name="enviar" value="{{ $denuncia->codDenuncia }}">
                              </form>
                              </td>
                              <td>{{ $denuncia->fechaCreacion }}</td>
                              <td>{{ $denuncia->tipoDenuncia }}</td>
                        </tr>
                        @empty
                        </tr>
                              <td colspan=6>No se han encontrado denuncias</td>
                        <tr>
                        @endforelse
                  
                  </tbody>

            </table>
      </div>
</div>


@endsection