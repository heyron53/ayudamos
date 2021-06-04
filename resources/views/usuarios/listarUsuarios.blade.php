@extends('plantillabase')
@section('contenido')

<div class="container alert">
      <h1>USUARIOS</h1>
      <ul class="nav nav-tabs">
            <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="listarUsuarios">Listar usuarios</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="listarDenuncias">Listar denuncias</a>
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
                              <th scope="col">Correo</th>
                              <th scope="col">Nickname</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Apellidos</th>
                              <th scope="col">ROL</th>
                              <th scope="col">Conocimientos</th>
                              <th></th>
                        </tr>
                  </thead>
                  <tbody>
                        @forelse ($usuarios as $usuario)
                        <tr>
                              <td>{{ $usuario->correo }}</td>
                              <td>{{ $usuario->nickname }}</td>
                              <td>{{ $usuario->nombre }}</td>
                              <td>{{ $usuario->apellidos }}</td>
                              <td>{{ $usuario->rol }}</td>
                              <td>{{ $usuario->conocimientos }}</td>
                              <td>
                                    <a href="#baneo" class="btn btn-danger btn-lg" data-toggle="modal">Banear</a>

                                    <div class="modal fade" id="baneo">
                                          <div class="modal-dialog">
                                                <div class="modal-content">
                                                      <div class="modal-header">
                                                      <h4>Banear</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                            <table class="table table-hover">
                                                                  <tbody>
                                                                        <tr>
                                                                              <td>
                                                                              <form action="crearBaneo" method="POST">
                                                                              @csrf
                                                                              @method('POST')
                                                                                    <input type="hidden" name="tipoBaneo" value="SPAM">
                                                                                    <input type="hidden" name="codUsu" value="{{ $usuario->correo }}">
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
                                                                                    <input type="hidden" name="codUsu" value="{{ $usuario->correo }}">
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
                                                                                    <input type="hidden" name="codUsu" value="{{ $usuario->correo }}">
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
                                                                                    <input type="hidden" name="codUsu" value="{{ $usuario->correo }}">
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
                                                                                    <input type="hidden" name="codUsu" value="{{ $usuario->correo }}">
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
                                                                                    <input type="hidden" name="codUsu" value="{{ $usuario->correo }}">
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
                                                                                    <input type="hidden" name="codUsu" value="{{ $usuario->correo }}">
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
                              </td>
                        </tr>
                        @empty
                        </tr>
                              <td colspan=6>No se han encontrado usuarios</td>
                        <tr>
                        @endforelse
                  </tbody>
            </table>
            </div>
      </div>
</div>
@endsection