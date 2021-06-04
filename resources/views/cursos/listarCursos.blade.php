@extends('plantillabase')
@section('contenido')


<div class="container alert">
    <h1>CURSOS</h1>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="listarCursos">Cursos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="listarAsignaturas">Asignaturas</a>
        </li>
    </ul>
    <div class="row alert">
        <div class="col-md-2">
            <ul class="list-group">
                <li><a href="listarCursos" class="btn btn-primary nav-link alert">Listar</a></li>
                <li><a href="crearCurso" class="btn btn-primary nav-link alert">Crear</a></li>
            </ul>
        </div>
        <div class="table-responsive col-md-10">
        <table class="table table-bordered bg-white text-dark" id="myTable">
                <tr>
                    <th>CURSOS</th>
                    <th></th>
                </tr>
                @forelse ($cursos as $curso)
                <tr>
                    <td>{{ $curso->nombre }}</td>
                    <td>
                        <form method="POST" action="editarCurso">
                        @csrf
                        @method('POST')
                            <input type="hidden" name="codCurso" value="{{ $curso->codCurso }}">
                            <input type="submit" class="btn btn-primary nav-link" name="enviar" value="Editar">
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan=2>No se han encontrado cursos</td>
                </tr> 
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection