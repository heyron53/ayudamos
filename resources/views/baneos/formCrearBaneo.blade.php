@extends('plantillabase')
@section('contenido')


<div class="container alert">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Banear</div>

                <div class="card-body">
                    <form method="POST" action="almacenarBaneo">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="codUsuBan" value="{{ $usuario }}">
                        <input type="hidden" name="tipoBaneo" value="{{ $tipo }}">
                        <div class="form-group row">
                              <label for="fechaFin" class="col-md-4 col-form-label text-md-right">Codigo asignatura</label>

                              <div class="col-md-6">
                                    <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Introduce un mensaje para el denunciado (OPCIONAL)." rows="7"></textarea>
                              </div>
                        </div>

                        <div class="form-group row">
                              <label for="fechaFin" class="col-md-4 col-form-label text-md-right">Fecha fin baneo</label>
                              <div class="col-md-6">
                                    <input type="date" name="fechaFin">
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