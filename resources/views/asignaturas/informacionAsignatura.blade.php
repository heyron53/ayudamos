@extends('plantillabase')
@section('contenido')

<div class="container alert">
      <h1>{{ $asignatura->nombre }}</h1>

      <p>
            {{ $asignatura->descripcion}}
      </p>
      <div class="row alert">
            <div class="table-responsive">
                  <table class="table table-bordered bg-white text-dark table stacktable">
                        <thead>
                              <tr>
                                    <th>CURSO PERTENECIENTES</th>
                              </tr>
                        </thead>
                        <tbody>
                              <tr>
                                    <td>{{ $curso->nombre }}</td>
                              </tr>
                        </tbody>
                  </table>
            </div>
      </div>
</div>

@endsection