@extends('plantillabase')
@section('contenido')
<div class="container alert">
<div class="table-responsive">
<h1>CONSULTAS</h1>
    <table class="table table-bordered bg-white text-dark" id="myTable">
        <thead class="col-lg-12">
            <tr>
                <th></th>
                <th>Mensaje</th>
                <th>Usuario</th>
                <th>Asignatura</th>
                <th>Fecha</th>
                <th>Puntuación</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="col-lg-12">
            @forelse ($consultas as $consulta)
            <tr>
                <td><img src="{{ $perfil[$consulta->codUsu] }}" alt="..." class="img-circle" width="50px" height="50px" style="border-radius: 50%"></td> 
                <td>
                    <form action="listarConsultas" method="POST">
                    @csrf
                    @method('POST') 
                        <input type="hidden" value="{{ $consulta->codCon }}" name="codigo">
                        <input type="submit" class="btn btn-link" value="{{ $consulta->nombre }}">
                    </form>
                </td>
                <td>
                <a href="#usuario" data-toggle="modal">{{ $usuarios[$consulta->codUsu] }}</a>
                    <div class="modal fade" id="usuario">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-head">      
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="{{ $perfil[$consulta->codUsu] }}" class="rounded-circle" width="200px" height="200px" id="perfilUsuarios">
                                        
                                    </div>
                                </div>
                                <div class="modal-body">
                                    
                                
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Nickname</h6>
                                    </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{ $usuarios[$consulta->codUsu] }}
                                        </div>
                                    </div>
                                <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Nombre</h6>
                                    </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{ $nombre[$consulta->codUsu] }}
                                        </div>
                                    </div>
                                <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Apellidos</h6>
                                    </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{ $apellidos[$consulta->codUsu] }}
                                        </div>
                                    </div>
                                <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Puntuación</h6>
                                    </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{ $puntuacion[$consulta->codUsu] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </td>
                <td>{{ $consulta->codAsignatura }}</td>
                <td>{{ $consulta->fechaCreacion }}</td>
                <td>
                    <div class="valoracion">
                        <input id="radio1" type="radio" name="estrellas" value="50">
                        <label for="radio1">★</label>
                        <input id="radio2" type="radio" name="estrellas" value="40">
                        <label for="radio2">★</label>
                        <input id="radio3" type="radio" name="estrellas" value="30">
                        <label for="radio3">★</label>
                        <input id="radio4" type="radio" name="estrellas" value="20">
                        <label for="radio4">★</label>
                        <input id="radio5" type="radio" name="estrellas" value="10">
                        <label for="radio5">★</label>
                    </div>    
                </td>
                <td>
                    <a href="#ventana" data-toggle="modal"><img src="{{ asset('img\iconos\alert.png') }}" weight=50px height=50px></a>
                    <div class="modal fade" id="ventana">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Denunciar</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-warning" role="alert">
                                        ¡¡Recuerda que banear sin motivos es un delito!!
                                   </div>
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td >
                                                    <form action="crearDenuncia" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                        <input type="hidden" name="tipoDenuncia" value="SPAM">
                                                        <input type="hidden" name="codConsulta" value="{{ $consulta->codCon }}">
                                                        <input type="submit" name="enviar" value="Spam" class="btn btn-link">
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <form action="crearDenuncia" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                        <input type="hidden" name="tipoDenuncia" value="SEXUAL">
                                                        <input type="hidden" name="codConsulta" value="{{ $consulta->codCon }}">
                                                        <input type="submit" name="enviar" value="Contenido sexual" class="btn btn-link">
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <form action="crearDenuncia" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                        <input type="hidden" name="tipoDenuncia" value="ODIO">
                                                        <input type="hidden" name="codConsulta" value="{{ $consulta->codCon }}">
                                                        <input type="submit" name="enviar" value="Lenguaje o símbolos que incitan al odio" class="btn btn-link">
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <form action="crearDenuncia" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                        <input type="hidden" name="tipoDenuncia" value="VIOLENCIA">
                                                        <input type="hidden" name="codConsulta" value="{{ $consulta->codCon }}">
                                                        <input type="submit" name="enviar" value="Violencia" class="btn btn-link">
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <form action="crearDenuncia" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                        <input type="hidden" name="tipoDenuncia" value="ACOSO">
                                                        <input type="hidden" name="codConsulta" value="{{ $consulta->codCon }}">
                                                        <input type="submit" name="enviar" value="Bullying o acoso" class="btn btn-link">
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <form action="crearDenuncia" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                        <input type="hidden" name="tipoDenuncia" value="FRAUDE">
                                                        <input type="hidden" name="codConsulta" value="{{ $consulta->codCon }}">
                                                        <input type="submit" name="enviar" value="Fraude" class="btn btn-link">
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <form action="crearDenuncia" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                        <input type="hidden" name="tipoDenuncia" value="FALSO">
                                                        <input type="hidden" name="codConsulta" value="{{ $consulta->codCon }}">
                                                        <input type="submit" name="enviar" value="Información falsa" class="btn btn-link">
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr >
                <td colspan=6>No se han encontrado consultas</td>
            </tr> 
            @endforelse
        </tbody>
    </table>
    </div>
</div>

@endsection