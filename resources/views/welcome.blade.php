
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dependencia de SSU, PS y EC</title>
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

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center shadow">

   

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/logo_epis.png') }}" alt="">
        <span class="d-none d-lg-block">EPIS</span>
      </a>
    </div><!-- End Logo -->

    <h5>Dependencia de Servicio Social, Proyección Social y Extensión Cultural</h5>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          
          <span class="d-none d-md-block  ps-2">
            @auth
              <a href="{{route('home')}}" class="btn btn-primary"><i class="bi bi-house-door"></i> Home</a>
            @endauth

            @guest            
              <a href="{{route('login')}}" class="btn btn-primary"><i class="bi bi-person"></i> Iniciar sesión</a>
            @endguest
            
          </span>


        </li><!-- End Sesion Buttons Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Main ======= -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Página informativa</h1>
    </div><!-- End Page Title -->
    

    <section class="section">
      <div class="row ">

        <div class="col-4">
          
          <div class="card basic">
            <div class="card-body">
              <h5 class="card-title">Sobre la dependencia</h5>


              <!-- Default Accordion -->
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      1. Sobre la dependencia
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>Esta dependencia y este software web está basado en la <b>Resolución N° 0623-2021-CU-UNH</b>.</p>
                      <p>En esta resolución se establece el Reglamento de Servicio Social Universitario, Proyección Social y Extensicón Cultural de la Universidad Nacional de Huancavelica.</p>
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      2. Servicio Social
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>El servicio social universitario es un medio por el cual la universidad a través de sussetudiantes colabora, ayuda o realiza labor altruista en las zonas más vulnerables, a través de la transmisión de los conocimientos adquiridos en su formación, mediante la ejecución de pequeños proyectos y de manera temporal para ayudar a solucionar parte o la totalidad de algún problema identificado.</p>
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      3. Extensión Cultural
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>La extensión cultural es un espacio de interación de la Universidad con diversos ámbitos de la sociedad: las comunidades educativas en los distintos niveles y modalidades, la sociedad civil, los egresados, la familia, el sector público, el sector privado y el conjunto de comunidades académicas locales, regionales, nacionales e internacionales.</p>
                      <p>Busca el bienestar general y la satisfacción de las necesidades de la sociedad a partir del conocimiento, divulgación, estudio, enriquecimiento y conservación del patrimonio natural, cultural, artístico y ambiental.</p>
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="headingFour">
                      4. Proyección Social
                    </button>
                  </h2>
                  <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>La proyección social es una función sustantiva de la universidad que tiene como finalidad propiciar y establecer procesos permanentes de interacción e integración de la universad con su entorno, para asegurar su presencia en la vida socioeconómica y cultural de la región y el país, orientado a la compresión y solución de sus principales problemas y necesidades. Comprende las siguientes líneas de acción: educación y desarrollo humano; gestión y liderazgo empresarial; prevención y promoción de la salud; ingeniería para el desarrollo y exclusión social.</p>
                      <p>Estas línas están orientadas a la educación; la ciudadnía y buena convivencia; a la constitución de redes de paz; a la promoción de las capacidades humanas; a la prevención de la enermedad y promoción de la salud; al desarrollo agropecuario, infraestructura y equipamiento.</p>
                    </div>
                  </div>
                </div>


              </div><!-- End Default Accordion Example -->


            </div>
          </div>

        </div>

        <div class="col-8 ">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Algunos proyectos realizados</h5>

              <!-- Slides with captions -->
              <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('assets/img/hatariy3.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 class="shadow-lg fw-bold">GRUPO MONOVALENTE DE EXTENSIÓN CULTURAL: "HATARIY"</h5>
                      <p class="shadow-lg fw-bold">TALLER DE DANZA</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('assets/img/aromas03.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 class="shadow-lg fw-bold">GRUPO MONOVALENTE DE EXTENSIÓN CULTURAL: AGRUPACIÓN AROMAS</h5>
                      <p class="shadow-lg fw-bold">TALLER DE CANTO Y MÚSICA</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('assets/img/webvirtual2018_01.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 class="shadow-lg fw-bold">GRUPO MONOVALENTE: WEB VIRTUAL 2018</h5>
                      <p class="shadow-lg fw-bold">DISEÑO DE UNA PÁGINA WEB Y AULA VIRTUAL PARA LA INSTITUCIÓN EDUCATIVA DE MUJERES NUESTRA SEÑORA DE LOURDES.</p>                      
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('assets/img/navi01.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 class="shadow-lg fw-bold">GRUPO MONOVALENTE: NATUS VINCERE</h5>
                      <p class="shadow-lg fw-bold">SUMINISTRO DE IMPRESIÓN A LAS DIFERENTES ÁREAS ADMINISTRATIVAS UTILIZANDO LA INFRAESTRUCTURA DE LA RED DE DATOS DE LA ESCUELA PROFESIONAL DE INGENEIRÍA DE SISTEMAS</p>                      
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('assets/img/navi01.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 class="shadow-lg fw-bold">GRUPO MONOVALENTE: NEXUS</h5>
                      <p class="shadow-lg fw-bold">SUMINISTRO DE IMPRESIÓN A LAS DIFERENTES ÁREAS ADMINISTRATIVAS UTILIZANDO LA INFRAESTRUCTURA DE LA RED DE DATOS DE LA ESCUELA PROFESIONAL DE INGENEIRÍA DE SISTEMAS</p>                      
                    </div>
                  </div>
                </div>
    
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Siguiente</span>
                </button>
    
              </div><!-- End Slides with captions -->
            </div>
          </div>
        </div>
        

       
      </div>
    </section>

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
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }} "></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.j') }}s"></script>


</body>

</html>


