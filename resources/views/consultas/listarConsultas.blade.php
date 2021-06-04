@extends('plantillabase')
@section('contenido')
<form action="{{ route('usuario.profile') }}" method="POST">
    @csrf
    @method('POST') 
    <input type="submit" name="enviar" id="enviar" value="Mi perfil">
</form>
<table class="table table-bordered bg-white text-dark">
    <tr>
        <th>CodCon</th>
        <th>codUsu</th>
        <th>Nombre</th>
        <th>Contenido</th>
        <th>ConsultaReferente</th>
        <th>CodTemas</th>
    </tr>
    @forelse ($consultas as $consulta)
    <tr>
        <td>{{ $consulta->codCon }}</td>
        <td>{{ $consulta->codUsu }}</td>
        <td>{{ $consulta->nombre }}</td>
        <td>{{ $consulta->contenido }}</td>
        <td>{{ $consulta->consultaReferente }}</td>
        <td>{{ $consulta->codTemas }}</td>
    </tr>
    @empty
    <tr>
    <td colspan=6>No se han encontrado consultas</td>
    </tr> 
    @endforelse
</table>
@endsection