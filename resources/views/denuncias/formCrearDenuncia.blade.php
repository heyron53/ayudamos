@extends('plantillabase')
@section('contenido')

<div class="container alert">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Denunciar</div>

                <div class="card-body">
                    <form method="POST" action="almacenarDenuncia">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="tipoDenuncia" value="{{ $denuncia }}">
                        <input type="hidden" name="codConsulta" value="{{ $consulta }}">
                        <div class="form-group row">
                              <label for="contenido" class="col-md-4 col-form-label text-md-right">Contenido</label>
                            
                            <div class="col-md-8">
                                <textarea class="form-control" id="contenido" name="contenido" placeholder="Introduce información sobre la denuncia (OPCIONAL)." rows="7"></textarea>
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


