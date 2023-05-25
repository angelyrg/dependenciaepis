<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EPIS | Login </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body class="toggle-sidebar">

  @include('layouts.flashtoast')

  <!-- ======= Main ======= -->
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center ">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a class="logo d-flex align-items-center w-auto">
                  <img src="{{ asset('assets/img/logo_epis.png') }} " alt="">
                  <span class="d-none d-lg-block">Dependencia de SSU, PS y EC </span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Iniciar sesión</h5>
                    <p class="text-center small">Ingrese su usuario y contraseña</p>
                  </div>

                  <form action="{{route('login')}}" method="POST" class="row g-3 needs-validation" novalidate >
                    @csrf

                    <div class="col-12">
                      <label for="username" class="form-label">Usuario</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                        <input type="text" name="username" class="form-control" id="username" maxlength="10" required>
                        <div class="invalid-feedback">Ingresa tu usuario.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>

                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control" id="password" required>
                        <div class="invalid-feedback">Ingresa tu contraseña.</div>
                        </div>
                    </div>


                    <div class="col-12">
                      @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li> {{ $error }}</li>
                            @endforeach
                          </ul>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif
                    </div>
                    <!--End Mensajes de error-->

                    
                    <div class="col-12 ">
                      <button class="btn btn-primary w-100" type="submit">Iniciar sesión</button>
                    </div>

                    <div class="col-12 text-center">
                      <a href="{{route('welcome')}}" class="text-decoration-underline">Salir de login</a>
                    </div>


                  </form> <!-- End Login Form -->

                </div>
              </div>

            
            </div>
          </div>
        </div>

      </section>
      
    </div>
  </main><!-- End #main -->
  
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <br>
      <span> <strong>Scrum Master: </strong>Mg. Ing. Gilmer Matos Vila</span><br>
      <span> <strong>Product Owner:</strong>Mg. Ing. Gilmer Matos Vila</span>
    </div>
    <div class="credits">
      <span> <strong>Scrum Team:</strong></span><br>
      <span> Waldir Chunhuay Ruiz</span><br>
      <span> Angela Paucar Soto</span><br>
      <span> Jose Fernando Guillermo Ccoriñaupa</span><br>
      <span> Angela Beatriz Acuña Huaman</span><br>
      <span> Renzo Huaranga Lopez </span><br>
      <strong> Escuela Profesional de</strong> <a href="https://sistemas.unh.edu.pe" target="_blank">Ingeniería de Sistemas</a>
    </div>
  </footer><!-- End Footer -->
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.j') }}s"></script>

</body>

</html>