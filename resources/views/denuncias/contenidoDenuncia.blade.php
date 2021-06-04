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
      <div class="col-md-2">
            <ul class="list-group">
                  <li>
                  <a href="#baneo" class="btn btn-danger nav-link alert nav-link alert" data-toggle="modal">Banear</a>

                  <div class="modal fade" id="baneo">
                                          <div class="modal-dialog">
                                                <div class="modal-content">
                                                      <div class="modal-header">
                                                      <h4>Banear</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                      <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                  <tbody>
                                                                        <tr>
                                                                              <td>
                                                                              <form action="crearBaneo" method="POST">
                                                                              @csrf
                                                                              @method('POST')
                                                                                    <input type="hidden" name="tipoBaneo" value="SPAM">
                                                                                    <input type="hidden" name="codUsu" value="{{ $consulta->codUsu }}">
                                                                                    <input type="submit" name="enviar" value="Spam" class="btn btn-link">
                                                                              </form>
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <td>
                                                                              <form action="crearBaneo" method="POST">
                                                                              @csrf
                                                                              @method('POST')
                                                                                    <input type="hidden" name="tipoBaneo" value="SEXUAL">
                                                                                    <input type="hidden" name="codUsu" value="{{ $consulta->codUsu }}">
                                                                                    <input type="submit" name="enviar" value="Contenido sexual" class="btn btn-link">
                                                                              </form>
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <td>
                                                                              <form action="crearBaneo" method="POST">
                                                                              @csrf
                                                                              @method('POST')
                                                                                    <input type="hidden" name="tipoBaneo" value="ODIO">
                                                                                    <input type="hidden" name="codUsu" value="{{ $consulta->codUsu }}">
                                                                                    <input type="submit" name="enviar" value="Lenguaje o símbolos que incitan al odio" class="btn btn-link">
                                                                              </form>
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <td>
                                                                              <form action="crearBaneo" method="POST">
                                                                              @csrf
                                                                              @method('POST')
                                                                                    <input type="hidden" name="tipoBaneo" value="VIOLENCIA">
                                                                                    <input type="hidden" name="codUsu" value="{{ $consulta->codUsu }}">
                                                                                    <input type="submit" name="enviar" value="Violencia" class="btn btn-link">
                                                                              </form>
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <td>
                                                                              <form action="crearBaneo" method="POST">
                                                                              @csrf
                                                                              @method('POST')
                                                                                    <input type="hidden" name="tipoBaneo" value="ACOSO">
                                                                                    <input type="hidden" name="codUsu" value="{{ $consulta->codUsu }}">
                                                                                    <input type="submit" name="enviar" value="Bullying o acoso" class="btn btn-link">
                                                                              </form>
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <td>
                                                                              <form action="crearBaneo" method="POST">
                                                                              @csrf
                                                                              @method('POST')
                                                                                    <input type="hidden" name="tipoBaneo" value="FRAUDE">
                                                                                    <input type="hidden" name="codUsu" value="{{ $consulta->codUsu }}">
                                                                                    <input type="submit" name="enviar" value="Fraude" class="btn btn-link">
                                                                              </form>
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <td>
                                                                              <form action="crearBaneo" method="POST">
                                                                              @csrf
                                                                              @method('POST')
                                                                                    <input type="hidden" name="tipoBaneo" value="FALSO">
                                                                                    <input type="hidden" name="codUsu" value="{{ $consulta->codUsu }}">
                                                                                    <input type="submit" name="enviar" value="Información falsa" class="btn btn-link">
                                                                              </form>
                                                                              </td>
                                                                        </tr>
                                                                  </tbody>
                                                            </table>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                  
                  </li>
                  <li>
                  <form action="eliminarDenuncia" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="codDenuncia" value="{{ $denuncia->codDenuncia }}">
                        <input type="submit" class="btn btn-primary nav-link alert" name="enviar" value="Eliminar">
                  </form>
                  </li>
            </ul>
        </div>
        <table class="table table-bordered bg-white text-dark col-md-10">
                  <thead>
                        <tr>
                              <th>DENUNCIANTE</th>
                              <th>DENUNCIADO</th>
                              <th>CONTENIDO</th>
                              <th>MENSAJE</th>
                              <th>FECHA DENUNCIA</th>
                        </tr>
                  </thead>
                  <tbody>
                        <tr>
                              <td>{{ $usu->correo }}</td>
                              <td>{{ $consulta->codUsu }}</td>
                              <td>{{ $consulta->contenido }}</td>
                              <td>{{ $denuncia->contenido }}</td>
                              <td>{{ $consulta->fechaCreacion }}</td>
                        </tr>
                  </tbody>
            </table>
      </div>
</div>
@endsection