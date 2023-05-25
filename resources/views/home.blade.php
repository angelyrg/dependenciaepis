
@extends('layouts.niceadmin')

@section('content')


<div class="pagetitle">
  <h1>Dashboard</h1>
  <ol class="breadcrumb">
      <li class="breadcrumb-item active">Home</li>
  </ol>
</div><!-- End Page Title -->

<section class="section dashboard">

    <div class="row">


      @if (Auth::user()->rol == "Ejecutor")

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="card-title">{{$ejecutor->proyecto->nombre_proyecto }}<span>| Informes</span> </h5>
                </div>
                <div class="row border d-flex justify-content-center align-items-center">
                  <div class="col-lg-3">
                      Estado del proyecto: 
                      <span class="badge bg-@if($ejecutor->proyecto->estado=="Inicio"){{'secondary'}}@elseif($ejecutor->proyecto->estado=="Parcial"){{'warning'}}@elseif($ejecutor->proyecto->estado=="Completado"){{'success'}}@endif">
                        <i class="bi bi-ui-checks"></i> 
                        {{$ejecutor->proyecto->estado}}
                      </span>
                  </div>
                  <div class="col-lg-9  ">
                    <div class="progress">
                      <div class="progress-bar bg-@if($ejecutor->proyecto->estado=="Inicio"){{'secondary'}}@elseif($ejecutor->proyecto->estado=="Parcial"){{'warning'}}@elseif($ejecutor->proyecto->estado=="Completado"){{'success'}}@endif" role="progressbar" style="width: {{$porc_proyecto}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$porc_proyecto}}%</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Miembros del proyecto <span>| Cantidad</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{count($ejecutor->proyecto->miembros)}}</h6>
                    <span class="text-success small pt-1 fw-bold">Integrantes</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Asesores del proyecto <span>| </span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{count($ejecutor->proyecto->asesores)}}</h6>
                    <span class="text-success small pt-1 fw-bold">Asesores</span>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Informes cargados <span>| Entregables</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{count($ejecutor->proyecto->informes)}}</h6>
                    <span class="text-success small pt-1 fw-bold">Documentos</span>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

        </div>

        <div class="row">
          <div class="col-12">

            <!-- News & Updates Traffic -->
            <div class="card">
              <div class="card-body pb-0">
                <h5 class="card-title">Más información <span>| Grupo {{$ejecutor->proyecto->modalidad_grupo}}</span></h5>

                
                <div class="news">
                  <div class="row">
                    <div class="col-6">
      
                      <div class="post-item ">
                        <h4><a >Nombre del grupo</a></h4>
                        <p>{{$ejecutor->proyecto->nombre_grupo}}</p>
                      </div>
      
                      <div class="post-item ">
                        <h4><a >Modalidad del proyecto</a></h4>
                        <p>{{$ejecutor->proyecto->modalidad->nombre}}</p>
                      </div>
                    </div>
    
                    <div class="col-6">
                      <div class="post-item ">
                        <h4><a >Duración del proyecto</a></h4>
                        <?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?> <!-- Necesario para tener los meses del año en español -->
                        <p>{{$meses[date('m', strtotime($ejecutor->proyecto->fecha_inicio))-1]." ".date('Y', strtotime($ejecutor->proyecto->fecha_inicio))." - ".$meses[date('m', strtotime($ejecutor->proyecto->fecha_fin))-1]." ".date('Y', strtotime($ejecutor->proyecto->fecha_fin))}}</p>
                      </div>
                      
                      <div class="post-item ">
                        <h4><a >Asesores</a></h4>
                        <ul>
                          @foreach ($ejecutor->proyecto->asesores as $asesor)
                          <p>{{$asesor->nombres." ".$asesor->apellidos}}</p>
                          @endforeach
                        </ul>
                      </div>
                    </div>

                  </div>


                </div><!-- End sidebar recent posts-->

              </div>
            </div><!-- End News & Updates -->
            
          </div>




        </div>

      @elseif (Auth::user()->rol == "Asesor")

        <div class="row">

          @foreach ($asesor->asesorados as $asesorado)
              
          <!-- Revenue Card -->
          <div class="col-md-6">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Proyecto asesorado <span>| {{$asesorado->nombre_grupo}}</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-layout-text-window-reverse"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$asesorado->nombre_proyecto}}</h6>
                    <span class="text-success small pt-1 fw-bold">{{"Grupo ".$asesorado->modalidad_grupo." de ".$asesorado->modalidad->nombre}}</span>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          @endforeach



        </div>

      @elseif (Auth::user()->rol == "Responsable")
        
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Proyectos según su estado</h5>

              <!-- Column Chart -->
              <div id="columnChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#columnChart"), {
                    series: [{
                      name: 'Inicio',
                      data: <?= json_encode($data[0]); ?>
                    }, {
                      name: 'Parcial',
                      data: <?= json_encode($data[1]); ?>
                    }, {
                      name: 'Completado',
                      data: <?= json_encode($data[2]); ?>
                    }],
                    chart: {
                      type: 'bar',
                      height: 350
                    },
                    plotOptions: {
                      bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                      },
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      show: true,
                      width: 2,
                      colors: ['transparent']
                    },
                    xaxis: {
                      categories: <?= json_encode($data[4]); ?>,
                    },
                    yaxis: {
                      title: {
                        text: 'Cantidad de Proyectos'
                      }
                    },
                    fill: {
                      opacity: 1
                    },
                    tooltip: {
                      y: {
                        formatter: function(val) {
                          return  val + " proyectos"
                        }
                      }
                    }
                  }).render();
                });
              </script>

            </div>
          </div>
        </div>
        <!-- End Pie Chart -->


        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Proyectos según la Modalidad</h5>

              
              <div id="pieChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#pieChart"), {
                    series: <?= json_encode($data[3]); ?>,
                    chart: {
                      height: 350,
                      type: 'pie',
                      toolbar: {
                        show: true
                      }
                    },
                    labels: <?= json_encode($data[4]); ?>,
                  }).render();
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div>
        </div>


      @endif


    </div>
</section>



@endsection