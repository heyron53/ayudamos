@extends('plantillabase')
@section('contenido')

<div class="container alert">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">FICHERO</div>

                <div class="card-body">
                    <form method="POST" action="almacenarFichero" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="codUsu" value="{{ session('user')['correo'] }}">
                        
                        <div class="form-group row">
                            <label for="fichero" class="col-md-2 col-form-label text-md-right">Sube un fichero</label>

                            <div class="col-md-10">
                                <input type="file" class="btn btn-light" name="fichero" accept=".pdf">
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Guardar">
                  </form>
            </div>
        </div>
      </div>
</div>

@endsection