@extends('plantillabase')
@section('contenido')


<div class="container alert">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear asignatura</div>

                <div class="card-body">
                    <form method="POST" action="almacenarAsignaturaEditada">
                        @csrf
                        @method('POST')

                        <input type="hidden" name="codAsignatura" value="{{ $asignatura->codAsignatura }}">

                        <div class="form-group row">
                              <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                              <div class="col-md-6">
                                    <input id="nombre" type="text" id="formGroupExampleInput" name="nombre" value="{{ $asignatura->nombre }}">
                              </div>
                        </div>
                        
                        <div class="form-group row">
                              <label for="descripcion" class="col-md-4 col-form-label text-md-right">Contenido</label>
                            
                            <div class="col-md-8">
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="7">
                                {{ $asignatura->descripcion }}
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="curso" class="col-md-4 col-form-label text-md-right">Curso</label>

                              <select name="codCurso">
                                    @forelse($cursos as $curso)
                                          <option value="{{ $curso->codCurso }}">{{ $curso->nombre }}</option>
                                    @empty
                                    @endforelse
                              </select>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear
                                </button>
                            </div>
                        </div>
                  </form>
            </div>
        </div>
      </div>
</div>

@endsection