@extends('plantillabase')
@section('contenido')

<div class="container alert">
    <div class="row justify-content-center alert">
      <form action="almacenarCambioUsuario" method="POST" enctype="multipart/form-data">
      @csrf
      @method('POST')
      <input type="hidden" name="correo" value="{{ session("user")["correo"] }}">
      <div class="card">
            <div class="card-header">
                  Editar perfil
            </div>
            <div class="card-body">
                        <table class="table alert col-md-10">
                        <tbody>
                        <tr>
                              <th scope="row">Foto de perfil</th>
                              <td><input type="file" name="imagen"></td>
                        </tr>
                        <tr>
                              <th scope="row">Nickname</th>
                              <td><input type="text" name="nickname" value="{{ session("user")["nickname"] }}"></td>
                        </tr>
                        <tr>
                              <th scope="row">Nombre</th>
                              <td><input type="text" name="nombre" value="{{ session("user")["nombre"] }}"></td>
                        </tr>
                        <tr>
                              <th scope="row">Apellidos</th>
                              <td><input type="text" name="apellidos" value="{{ session("user")["apellidos"] }}"></td>
                        </tr>
                        <tr>
                              <th scope="row">Conocimientos</th>
                              <td><select multiple name="conocimientos[]" id="conocimientos[]">
                                          @forelse ($cursos as $curso)
                                          <option value="{{ $curso->nombre }}">{{ $curso->nombre }}</option>
                                          @empty
                                                No se han encontrado cursos
                                          @endforelse
                                    </select></td>
                        </tr>
                        
                        <tr>
                              <td>
                                    <input type="submit" class="btn btn-primary" value="Editar">
                              </td>
                        </tr>
                        </tbody>
                  </table>

            </div>
      </div>
      </form>

    </div>
</div>
       
@endsection

