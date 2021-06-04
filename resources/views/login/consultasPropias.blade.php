@extends('plantillabase')
@section('contenido')

<div class="container alert">
    <div class="table-responsive col-md-12">
        <table class="table table-bordered bg-white text-dark" id="myTable">
            <tr>
                
                <th>Nombre</th>
                <th>CodAsignatura</th>
            </tr>
            @forelse ($consultas as $consulta)
            <tr>

                <td>{{ $consulta->nombre }}</td>
                <td>{{ $consulta->codAsignatura }}</td>
            </tr>
            @empty
            <tr>
                <td colspan=7>No se han encontrado consultas</td>
            </tr> 
            @endforelse
        </table>
    </div>
</div>
@endsection