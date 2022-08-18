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
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  

  @yield('css')

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('home')}}" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/logo_epis.png') }}" alt="">
        <span class="d-none d-lg-block">Dependencia</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        @if (Auth::user()->rol == 'Responsable')
          @include('layouts.notifications')
        @endif


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if (Auth::user()->rol == 'Responsable')
              <img src="{{ asset('assets/img/manager.png') }}" alt="Profile" class="rounded-circle">
            @elseif (Auth::user()->rol == 'Asesor')
              <img src="{{ asset('assets/img/profesor2.png') }}" alt="Profile" class="rounded-circle">
            @elseif (Auth::user()->rol == 'Ejecutor')                
              <img src="{{ asset('assets/img/student.png') }}" alt="Profile" class="rounded-circle">
            @endif
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              <span>{{ Auth::user()->rol }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('profile')}}">
                <i class="bi bi-gear"></i>
                <span>Cambiar contraseña</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <form action="{{route('logout')}}" method="post" style="display: inline">
                @csrf
                <button class="dropdown-item d-flex align-items-center" type="submit">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Cerrar sesión</span>
                </button>
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->



  <!-- ====================== Sidebar ================== -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('home')}}" >
          <i class="bi bi-grid"></i>
          <span>INICIO</span>
        </a>
      </li><!-- End MENU Nav -->

      @if (Auth::user()->rol == 'Responsable')
      
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>Gestión de usuarios</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{route('asesors.index')}}">
                <i class="bi bi-circle"></i><span>Asesores</span>
              </a>
            </li>
            <li>
              <a href="{{route('ejecutores.index')}}">
                <i class="bi bi-circle"></i><span>Ejecutores</span>
              </a>
            </li>
          </ul>
        </li><!-- End Usuarios Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Gestión de proyectos</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{route('proyectos.index')}}">
                <i class="bi bi-circle"></i><span>Proyecto</span>
              </a>
            </li>
            <li>
              <a href="{{route('calendario')}}">
                <i class="bi bi-circle"></i><span>Calendario</span>
              </a>
            </li>
          </ul>
        </li><!-- End Proyectos Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Gestion de informes</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{route('responsable.informes.index')}}">
                <i class="bi bi-circle"></i><span>Informes de los grupos</span>
              </a>
            </li>
            <li>
              <a href="{{route('informesdinamicos')}}">
                <i class="bi bi-circle"></i><span>Informes dinámicos</span>
              </a>
            </li>
            <li>
              <a href="{{route('indiceparticipacion')}}">
                <i class="bi bi-circle"></i><span>Indicador de participación</span>
              </a>
            </li>
          </ul>
        </li><!-- End Informes Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('modalidads.index')}}">
            <i class="bi bi-gem"></i>
            <span>Modalidades</span>
          </a>
        </li><!-- End Modalidades Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('cargos.index')}}">
            <i class="bi bi-gear"></i>
            <span>Cargos</span>
          </a>
        </li><!-- End Cargos Page Nav -->

        <li class="nav-heading">COMPONENTES</li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('reglamentos.index')}}">
            <i class="bi bi-file-earmark-text-fill"></i>
            <span>Reglamento</span>
          </a>
        </li><!-- End Reglamento Page Nav -->
      

      @elseif (Auth::user()->rol == "Asesor")

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Gestión de Proyectos</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{route('aproyectos.index')}}">
                <i class="bi bi-circle"></i><span>Proyectos</span>
              </a>
            </li>
          </ul>
        </li><!-- End Proyectos Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart-steps"></i><span>Gestion de entregables</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{route('asesorados')}}">
                <i class="bi bi-circle"></i><span>Grupos</span>
              </a>
            </li>
          </ul>
        </li><!-- End Entregables Nav -->

        <li class="nav-heading">COMPONENTES</li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('areglamentos')}}">
            <i class="bi bi-file-earmark-text-fill"></i>
            <span>Reglamento</span>
          </a>
        </li><!-- End Reglamento Nav -->


      @elseif (Auth::user()->rol == "Ejecutor")

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Proyecto</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{route('proyecto')}}">
                <i class="bi bi-circle"></i><span>Integrantes del grupo</span>
              </a>
            </li>
            <li>
              <a href="{{route('asesor')}}">
                <i class="bi bi-circle"></i><span>Asesores</span>
              </a>
            </li>
          </ul>
        </li><!-- End Proyecto Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart-steps"></i><span>Gestion de informes</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{route('informes.index')}}">
                <i class="bi bi-circle"></i><span>Seguimiento de entregables</span>
              </a>
            </li>
          </ul>
        </li><!-- End Entregables Nav -->

        <li class="nav-heading">COMPONENTES</li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('sreglamentos')}}">
            <i class="bi bi-file-earmark-text-fill"></i>
            <span>Reglamento</span>
          </a>
        </li><!-- End Reglamento Nav -->

      @endif


    </ul>
    
  </aside><!-- End Sidebar-->




  <main id="main" class="main">

    @yield('content')

  </main><!-- End #main -->



  
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Equipo 5</span></strong>
    </div>
    <div class="credits">
      <span>SCRUM MASTER: adfliuae</span><br>
      <span>Algo más</span><br>
        Escuela Profesional de <a href="https://sistemas.unh.edu.pe" target="_blank">Ingeniería de Sistemas</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }} "></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  
  <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }} "></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }} "></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }} "></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }} "></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.j') }}s"></script>



  @yield('js')

</body>

</html>