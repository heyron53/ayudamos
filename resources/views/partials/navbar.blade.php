      
@if(session("user")->rol == "NORMAL")
<input type="hidden" id="rol" value="NORMAL">
<nav class="navbar navbar-expand-lg navbar-light bg-primary ">
<div class="container">
  <a class="navbar-brand text-light" href="listarConsultas">HOME</a>
  <a class="navbar-brand text-light" href="listarFicheros">FICHEROS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">

    <ul class="navbar-nav ml-auto">
          <li>
          <img src="{{ session('user')['perfil'] }}" alt="..." class="img-circle" width="50px" height="50px" style="border-radius: 50%">
          </li>
          <li class="nav-item dropdown show">
                  <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ session("user")->nickname }}
                  </a>
                  <div class="dropdown-menu show" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item " href="perfil">Mi perfil</a>
          <form action="consultasUsu" method="POST">
                  @csrf
                  @method('POST') 
                  <input class="dropdown-item" type="submit" name="enviar" id="enviar" value="Mis consultas">
            </form>
                  <a class="dropdown-item" href="crearConsulta">Crear consulta</a>
                  <a class="dropdown-item" href="#">Información del foro</a>
            <form action="cerrarSesion" method="POST">
                  @csrf
                  @method('POST') 
                  <input class="dropdown-item" type="submit" name="enviar" id="enviar" value="Cerrar sesión">
            </form>
          </li>
      </ul>
  </div>
</div>
</nav>


@elseif (session("user")->rol == "MODERADOR")
<input type="hidden" id="rol" value="MODER">
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
<div class="container">
  <a class="navbar-brand text-light" href="listarConsultas">HOME</a>
  <a class="navbar-brand text-light" href="listarFicheros">FICHEROS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav" id="enlaces">
      <input type="hidden" id="valorBoton" value="false">
    </ul>
    <ul class="navbar-nav ml-auto">
          <li>
            <button id="cambiarBarra" class="btn btn-outline-primary"><img src="{{ asset('img\iconos\corona.png') }}" weight=30px height=30px></button>
          </li>
          <li>
          <img src="{{ session('user')['perfil'] }}" alt="..." class="img-circle" width="50px" height="50px" style="border-radius: 50%">          </li>
          <li class="nav-item dropdown show">
                  <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ session("user")->nickname }}
                  </a>
                  <div class="dropdown-menu show" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item " href="perfil">Mi perfil</a>
          <form action="consultasUsu" method="POST">
                  @csrf
                  @method('POST') 
                  <input class="dropdown-item" type="submit" name="consulta" id="consulta" value="Mis consultas">
            </form>
                  <a class="dropdown-item" href="crearConsulta">Crear consulta</a>
                  <a class="dropdown-item" href="#">Información del foro</a>
            <form action="cerrarSesion" method="POST">
                  @csrf
                  @method('POST') 
                  <input class="dropdown-item" type="submit" name="cerrar" id="cerrar" value="Cerrar sesión">
            </form>
          </li>
      </ul>
  </div>
</nav>


@elseif (session("user")->rol == "ADMINISTRADOR")
<input type="hidden" id="rol" value="ADMIN">
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
<div class="container">
  <a class="navbar-brand text-light" href="listarConsultas">HOME</a>
  <a class="navbar-brand text-light" href="listarFicheros">FICHEROS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav" id="enlaces">
      <input type="hidden" id="valorBoton" value="false">
      
    </ul>
    <ul class="navbar-nav ml-auto">
          <li>
            <button id="cambiarBarra" class="btn btn-outline-primary"><img src="{{ asset('img\iconos\corona.png') }}" weight=30px height=30px></button>
          </li>
          <li>
            
            <img src="{{ session('user')['perfil'] }}" alt="..." class="img-circle" width="50px" height="50px" style="border-radius: 50%">          
          </li>
          <li class="nav-item dropdown show">
                  <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ session("user")->nickname }}
                  </a>
                  <div class="dropdown-menu show" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item " href="perfil">Mi perfil</a>
            <form action="consultasUsu" method="POST">
                  @csrf
                  @method('POST') 
                  <input class="dropdown-item" type="submit" name="consulta" id="consulta" value="Mis consultas">
            </form>
                  <a class="dropdown-item" href="crearConsulta">Crear consulta</a>
                  <a class="dropdown-item" href="info">Información del foro</a>
            <form action="cerrarSesion" method="POST">
                  @csrf
                  @method('POST') 
                  <input class="dropdown-item" type="submit" name="cerrar" id="cerrar" value="Cerrar sesión">
            </form>
          </li>
      </ul>
  </div>
</nav>


@endif



