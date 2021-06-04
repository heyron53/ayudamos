@extends('plantillabase')
@section('contenido')

<div class="container alert">
    <div class="main-body">
    <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ session('user')['perfil'] }}" alt="Admin" class="rounded-circle" width="200px" height="200px">
                    <div class="mt-3">
                      <h4>{{ session("user")["nickname"] }}</h4>
                      <a href="editarUsuario" class="btn btn-primary nav-link alert">Editar perfil</a>
                      <a href="crearFichero" class="btn btn-primary nav-link alert">Subir fichero</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Nickname</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        {{ session("user")["nickname"] }}
                        </div>
                    </div>
                  <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Nombre</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        {{ session("user")["nombre"] }}
                        </div>
                    </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Apellidos</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ session("user")["apellidos"] }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Correo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ session("user")["correo"] }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Conocimientos</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ session("user")["conocimientos"] }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Fecha creación</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ session("user")["fechaCreacion"] }}
                    </div>
                  </div>
                  
                
                </div>
              </div>
    </div>
</div>
@endsection

