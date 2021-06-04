@extends('plantillabase')
@section('contenido')


<div class="container alert">
    <h1>ASIGNATURAS</h1>
    <ul class="nav nav-tabs">
    <li class="nav-item">
            <a class="nav-link" aria-current="page" href="listarCursos">Cursos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="listarAsignaturas">Asignaturas</a>
        </li>
    </ul>

    <div class="row alert">
        <div class="col-md-2">
            <ul class="list-group">
                <li><a href="listarAsignaturas" class="btn btn-primary nav-link alert">Listar</a></li>
                <li><a href="crearAsignatura" class="btn btn-primary nav-link alert">Crear</a></li>
            </ul>
        </div>
        <div class="table-responsive col-md-10">
        <table class="table table-bordered bg-white text-dark" id="myTable">
            <thead>
                <tr>
                    <th>ASIGNATURAS</th>
                    <th>CURSOS</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($asignaturas as $asignatura)
                <tr>
                    <td>{{ $asignatura->nombre }}</td>
                    <td>{{ $asignatura->codCurso }}</td>
                    <td>
                    <form method="POST" action="editarAsignatura">
                    @csrf
                    @method('POST')
                        <input type="hidden" name="codAsignatura" value="{{ $asignatura->codCurso }}">
                        <input type="submit" class="btn btn-primary nav-link" name="enviar" value="Editar">
                    </form>
                  
                </tr>
                @empty
                <tr>
                <td colspan=3>No se han encontrado consultas</td>
                </tr> 
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
    
</div>
@endsection