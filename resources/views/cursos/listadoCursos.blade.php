@extends('plantillabase')
@section('contenido')


<div class="container alert">
      <div class="table-responsive">
            <h1>CURSOS</h1>
           
                  <table class="table table-bordered bg-white text-dark" id="myTable">
                        <thead class="col-lg-12">
                              <tr>
                                    <th>NOMBRE</th>
                                    <th>ENLACE</th>
                              </tr>
                        </thead>
                        <tbody class="col-lg-12">
                              @forelse ($cursos as $curso)
                              <tr>
                                    <td>{{ $curso->nombre }}</td>
                                    <td>
                                          <form action="informacionCurso" method="POST">
                                          @csrf
                                          @method('POST') 
                                                <input type="hidden" name="codCurso" value="{{ $curso->codCurso }}">
                                                <input type="submit" class="btn btn-primary" value="Información">
                                          </form>
                                    </td>
                              </tr>
                              
                              @empty
                              <tr>
                                    <td colspan=2>No se han encontrado cursos</td>
                              </tr> 
                              @endforelse
                        </tbody>
                  </table>
          
      </div>
</div>
@endsection