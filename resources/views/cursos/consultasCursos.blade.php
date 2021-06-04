@extends('plantillabase')
@section('contenido')

<table class="table table-bordered bg-white text-dark">
<thead>
        <tr>
            <th></th>
            <th>Mensaje</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Puntuación</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($consultas as $consulta)
        <tr>
            <td><img src="{{asset('img/user.jpg')}}" alt="..." class="img-circle" width="50px" height="50px" style="border-radius: 50%"></td>
            <td>
                <form action="listarConsultas" method="POST">
                @csrf
                @method('POST') 
                    <input type="hidden" value="{{ $consulta->codCon }}" name="codigo">
                    <input type="submit" class="btn btn-link" value="{{ $consulta->nombre }}">
                </form>
            </td>
            <td>
                {{ $consulta->codUsu }}
            </td>
            <td>{{ $consulta->fechaCreacion }}</td>
            <td>{{ $consulta->puntuacion }}</td>

        </tr>
        @empty
        <tr>No se han encontrado consultas</tr> 
        @endforelse
    </tbody>
</table>


@endsection