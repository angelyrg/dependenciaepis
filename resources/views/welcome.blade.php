
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dependencia de SSU, PS y EC</title>

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="container align-content-center">
        <h1>Welcome page</h1>

        @auth
          <a href="{{route('home')}}" class="btn btn-outline-primary">Home</a>
        @endauth

        @guest            
          <a href="{{route('login')}}" class="btn btn-outline-primary">Iniciar sesisón</a>
        @endguest



    </div>


  </header>
</body>
</html>


