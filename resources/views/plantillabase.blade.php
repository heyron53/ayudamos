<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('/js/stacktable.js') }}" rel="stylesheet">
      <script src="{{ asset('/js/app.js') }}"></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
      
      <title>AyudaMos</title>


</head>
<body>
      
      <header>
            @include('partials.navbar')
      </header>
      <main>  
            <div class="container" id="contenedor">
                  @yield("contenido")
            </div>
      </main>
      
      <footer class="bg-light text-center">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2021 Copyright:
          <a class="text-dark" href="#">AyudaMos.com</a>
        </div>
      </footer>

      
      <script>
            $(document).ready( function () {
                  $('#myTable').DataTable();
                  } );
      </script>
</body>
<script src="{{ asset('/js/javascript.js') }}"></script>

</html>