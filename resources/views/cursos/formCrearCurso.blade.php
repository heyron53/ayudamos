@extends('plantillabase')
@section('contenido')


<div class="container alert">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear curso</div>

                <div class="card-body">
                    <form method="POST" action="almacenarCurso">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                              <label for="codCurso" class="col-md-4 col-form-label text-md-right">Codigo curso</label>

                              <div class="col-md-6">
                                    <input id="codCurso" type="text" id="formGroupExampleInput" name="codCurso" autofocus placeholder="Codigo curso.">
                              </div>
                        </div>

                        <div class="form-group row">
                              <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                              <div class="col-md-6">
                                    <input id="nombre" type="text" id="formGroupExampleInput" name="nombre" autofocus placeholder="Nombre asignatura.">
                              </div>
                        </div>
                        
                        <div class="form-group row">
                              <label for="descripcion" class="col-md-4 col-form-label text-md-right">Contenido</label>
                            
                            <div class="col-md-8">
                                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Introduce el contenido de tu incidencia." rows="7"></textarea>
                            </div>
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