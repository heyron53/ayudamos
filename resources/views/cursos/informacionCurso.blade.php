@extends('plantillabase')
@section('contenido')

<div class="container alert">
      <h1>{{ $curso->nombre }}</h1>

      <p>
            {{ $curso->descripcion}}
      </p>
      <div class="row alert">
            <div class="table-responsive">
                  <table class="table table-bordered bg-white text-dark table stacktable" id="myTable">
                        <thead>
                              <tr>
                                    <th>ASIGNATURAS DEL CURSO</th>
                              </tr>
                        </thead>
                        <tbody>
                              @forelse ( $asignaturas as $asignatura)
                              <tr>
                                    <td>{{ $asignatura->nombre }}</td>
                              </tr>
                              @empty
                              <tr>
                                    <td>Este curso no tiene asignaturas por el momento</td>
                              </tr>
                              @endforelse
                        </tbody>
                  </table>
            </div>
      </div>
</div>

@endsection