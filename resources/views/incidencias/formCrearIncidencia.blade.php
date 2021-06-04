@extends('plantillabase')
@section('contenido')


<div class="container alert">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear incidencia</div>

                <div class="card-body">
                    <form method="POST" action="almacenarIncidencia">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                              <label for="titulo" class="col-md-4 col-form-label text-md-right">Título</label>

                              <div class="col-md-6">
                                    <input id="titulo" type="text" id="formGroupExampleInput" name="titulo" autofocus placeholder="Este título identificará tu incidencia.">
                              </div>
                        </div>
                        
                        <div class="form-group row">
                              <label for="contenido" class="col-md-4 col-form-label text-md-right">Contenido</label>
                            
                            <div class="col-md-8">
                                <textarea class="form-control" id="contenido" name="contenido" placeholder="Introduce el contenido de tu incidencia." rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">

                              <label for="asignatura" class="col-md-4 col-form-label text-md-right">Fecha cierre</label>
                              <div class="col-md-8">
                                    <input type="date" id="cierre" name="cierre">
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