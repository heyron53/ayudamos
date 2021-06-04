@extends('plantillabase')
@section('contenido')
<div class="container alert">
<div class="table-responsive">
<h1>CONSULTAS</h1>
    <table class="table table-bordered bg-white text-dark" id="myTable">
        <thead class="col-lg-12">
            <tr>
                <th>Fichero</th>
                <th>Usuario</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="col-lg-12">
            @forelse ($ficheros as $fichero)
            <tr>
                  <td>{{ $fichero->nombre }}</td>
                  <td>{{ $usuarios[$fichero->codUsu] }}</td> 
                  <td>
                  <form action="descargarFichero" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="ruta" value="{{ $fichero->rutaFichero }}">
                        <input type="submit" class="btn btn-primary" value="Descargar">
                    </form>
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