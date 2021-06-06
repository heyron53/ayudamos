<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
      <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('/js/stacktable.js') }}" rel="stylesheet">
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

      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
      <script src="{{ asset('/js/app.js') }}"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
      <script>
            $(document).ready( function () {
                  $('#myTable').DataTable();
                  } );
      </script>
      <script src="{{ asset('/js/javascript.js') }}"></script>
     
</body>



</html>