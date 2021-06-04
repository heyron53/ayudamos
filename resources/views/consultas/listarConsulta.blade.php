@extends('plantillabase')
@section('contenido')
<div class="container bg-white alert">
    <div class="alert">
    
        <div class="card border-dark mb-3 ">
        <div class="card-header bg-secondary">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <ul class="navbar-nav">
                        <div class="alert">
                            <li>
                                <img src="{{ $perfiles[$consulta->codUsu] }}" alt="..." class="img-circle" width="50px" height="50px">
                            </li>
                        </div>
                        <div class="alert">
                            <li>
                                <h3>{{ $usuarios[$consulta->codUsu] }}</h3>
                            </li>
                        </div>
                        <div class="alert">
                            <li>
                                {{ $consulta->puntuacion }}
                            </li>
                        </div>
                    </ul>
                    <ul class="navbar-nav">
                        <div class="alert">
                            <li>
                                Enviado: {{ $consulta->fechaCreacion }}
                            </li>
                        </div>
                        
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
                                                    <td>
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
                        </div>
                    </ul>
                </div>
            </nav>
        </div>
        
        <div class="card-body">
            @if($consulta->imagen != NULL)
            <img src="{{ $consulta->imagen }}" alt="..." class="img-circle" width="100%" height="100%"> 
            @endif
            <p class="card-text">{{ $consulta->contenido }}</p>
        </div>
        </div>
    </div>

    <form action="crearConsultaHija" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" value="{{ $consulta->codCon }}" name="padre">
        <input type="hidden" value="{{ $consulta->codCurso }}" name="cursoPadre">
        <input type="hidden" value="{{ $consulta->codAsignatura}}" name="asignaturaPadre">
        <input type="submit" name="crearConsulta" value="Responder" class="btn btn-primary">
    </form>

    @forelse ($consultasHijas as $conHijas)

    <div class="alert">
        <div class="card">
        <div class="card-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <ul class="navbar-nav">
                        <div class="alert">
                            <li>
                                <img src="{{ $perfiles[$conHijas->codUsu] }}" alt="..." class="img-circle" width="50px" height="50px">
                            </li>
                        </div>
                        <div class="alert">
                            <li>
                                <h3>{{ $usuarios[$conHijas->codUsu] }}</h3>
                            </li>
                        </div>
                        <div class="alert">
                            <li>
                                {{ $conHijas->puntuacion }}
                            </li>
                        </div>
                    </ul>
                    <ul class="navbar-nav">
                        <div class="alert">
                            <li>
                                Enviado: {{ $conHijas->fechaCreacion }}
                            </li>
                        </div>
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
                                                    <td>
                                                        <form action="crearDenuncia" method="POST">
                                                        @csrf
                                                        @method('POST')
                                                            <input type="hidden" name="tipoDenuncia" value="SPAM">
                                                            <input type="hidden" name="codConsulta" value="{{ $conHijas->codCon }}">
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
                                                            <input type="hidden" name="codConsulta" value="{{ $conHijas->codCon }}">
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
                                                            <input type="hidden" name="codConsulta" value="{{ $conHijas->codCon }}">
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
                                                            <input type="hidden" name="codConsulta" value="{{ $conHijas->codCon }}">
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
                                                            <input type="hidden" name="codConsulta" value="{{ $conHijas->codCon }}">
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
                                                            <input type="hidden" name="codConsulta" value="{{ $conHijas->codCon }}">
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
                                                            <input type="hidden" name="codConsulta" value="{{ $conHijas->codCon }}">
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
                    </ul>
                </div>
            </nav>
        </div>
        
        <div class="card-body">
            @if($conHijas->imagen != NULL)
            <img src="{{ $conHijas->imagen }}" alt="..." class="img-circle" width="100%" height="100%">          </li>
            @endif
            <p class="card-text">{{ $conHijas->contenido }}</p>
        </div>
        </div>
    </div>
    @empty
    @endforelse
</div>
@endsection