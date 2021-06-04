@extends('plantillabase')

@section('contenido')
<div class="container alert">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear consulta</div>

                <div class="card-body">
                    <form method="POST" action="almacenarConsultaHija" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                              <label for="nombre" class="col-md-4 col-form-label text-md-right">Título</label>

                              <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('email') is-invalid @enderror" name="nombre" required autocomplete="nombre" autofocus placeholder="Este título identificará tu consulta.">
                              </div>
                        </div>
                        

                        <div class="form-group row">
                              <label for="contenido" class="col-md-4 col-form-label text-md-right">Contenido</label>
                            
                            <div class="col-md-8">
                                <textarea class="form-control" id="contenido" name="contenido" placeholder="Introduce el contenido de tu consulta." rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">Imágen</label>

                            <div class="col-md-6">
                                <input type="file" name="imagen" >
                            </div>
                        </div>

                        <input type="hidden" value="{{ $padre }}" name="padre">  
                        <input type="hidden" value="{{ $asignatura }}" name="asignatura"> 
                     
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