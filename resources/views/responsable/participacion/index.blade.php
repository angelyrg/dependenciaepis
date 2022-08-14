


@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')


<div class="pagetitle">
  <h1>Indicador de participación</h1>
  <ol class="breadcrumb">
      <li class="breadcrumb-item active">Home</li>
  </ol>
</div><!-- End Page Title -->

<section class="section dashboard">

    <div class="row">

      <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Estudiantes según el estado de su proyecto</h5>

            <div id="donutChart"></div>
      
            <script>
              document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#donutChart"), {
                  series: <?= json_encode($data); ?>,
                  colors: ['#7FB3D5', '#F4D03F', '#2ECC71', '#E74C3C'],
                  chart: {
                    height: 350,
                    type: 'donut',
                    toolbar: {
                      show: true
                    },
                    
                  },
                  labels: ['Proyecto en Inicio', 'Proyecto Parcial', 'Proyecto Completado', 'Sin Proyecto'],
                }).render();
              });
            </script>
            <!-- End Donut Chart -->
      
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card info-card sales-card">

          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Opciones</h6>
              </li>
              <li>
                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-set-students">
                  Establecer cantidad de estudiantes
                </button>
              </li>
            </ul>
          </div>
          @include('responsable.participacion.modal-setstudents')

          <div class="card-body">
            <h5 class="card-title">Estudiantes <span>| Total</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people-fill"></i>
              </div>
              <div class="ps-3">
                <h6>{{$total_estudiantes}}</h6>
                <span class="text-success small pt-1 fw-bold">Estudiantes</span> <span class="text-muted small pt-2 ps-1">matriculados</span>

              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
</section>



@endsection
