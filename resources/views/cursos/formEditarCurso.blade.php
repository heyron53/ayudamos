@extends('plantillabase')
@section('contenido')


<div class="container alert">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear curso</div>

                <div class="card-body">
                    <form method="POST" action="almacenarCursoEditado">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                              <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                              <div class="col-md-6">
                                    <input id="nombre" type="text" id="formGroupExampleInput" name="nombre" value="{{ $curso->nombre }}">
                              </div>
                        </div>
                        
                        <div class="form-group row">
                              <label for="descripcion" class="col-md-4 col-form-label text-md-right">Contenido</label>
                            
                            <div class="col-md-8">
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="7">
                                {{ $curso->descripcion }}
                                </textarea>
                            </div>
                        </div>

                        <input type="hidden" name="codCurso" value="{{ $curso->codCurso }}">

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Editar
                                </button>
                            </div>
                        </div>
                  </form>
            </div>
        </div>
      </div>
</div>

@endsection