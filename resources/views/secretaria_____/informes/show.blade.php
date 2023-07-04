
@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')


<div class="pagetitle">
  <h1>Entregables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Lista de entregables</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title">{{$proyecto->nombre_proyecto }}<span>| Informes</span> </h5>
          </div>
          <div class="row border d-flex justify-content-center align-items-center">
            <div class="col-lg-3">
                Estado del proyecto: 
                <span class="badge bg-@if($proyecto->estado=="Inicio"){{'secondary'}}@elseif($proyecto->estado=="Parcial"){{'warning'}}@elseif($proyecto->estado=="Completado"){{'success'}}@endif">
                  <i class="bi bi-ui-checks"></i> 
                  {{$proyecto->estado}}
                </span>
            </div>
            <div class="col-lg-9  ">
              <div class="progress">
                <div class="progress-bar bg-@if($proyecto->estado=="Inicio"){{'secondary'}}@elseif($proyecto->estado=="Parcial"){{'warning'}}@elseif($proyecto->estado=="Completado"){{'success'}}@endif" role="progressbar" style="width: {{$porc_proyecto}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$porc_proyecto}}%</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">

    <!-- Informe parcial -->
    <div class="col-lg-6">
      <!-- Entregables -->
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between  align-items-center">
            <h5 class="card-title">Informe parcial <span>| Historial</span></h5>
          </div>
          <div class="activity">
            @foreach ($proyecto->informes->reverse() as $informe)
              @if ($informe->tipo == "Informe Parcial")
                <div class="activity-item d-flex">
                  <div class="activite-label">{{$informe->created_at->diffForHumans()}}</div>
                  <i class='bi bi-circle-fill activity-badge text-secondary align-self-start'></i>
                  <div class="activity-content">
                    <b>{{$informe->nombre_informe}}</b>
                    <br>
                    {{$informe->descripcion}}
                    <p>
                      <small>Revisión del asesor: <span class="badge rounded-pill bg-@if($informe->estado_asesor=="Pendiente"){{'secondary'}}@elseif($informe->estado_asesor=="Rechazado"){{'danger'}}@elseif($informe->estado_asesor=="Observado"){{'warning'}}@elseif($informe->estado_asesor=="Aceptado"){{'primary'}}@elseif($informe->estado_asesor=="Publicado"){{'success'}}@endif">
                        <i class="bi bi-@if($informe->estado_asesor=="Pendiente"){{'circle'}}@elseif($informe->estado_asesor=="Rechazado"){{'x-circle'}}@elseif($informe->estado_asesor=="Observado"){{'exclamation-triangle'}}@elseif($informe->estado_asesor=="Aceptado"){{'check-circle'}}@elseif($informe->estado_asesor=="Publicado"){{'file-earmark-check'}}@endif"></i> {{$informe->estado_asesor}}</span>
                      </small>
                      <br>
                    </p>
                    <p>
                      <a href="{{asset('files/informes/'.$informe->archivo)}}" target="_blank" class="btn btn-sm btn-outline-success">
                        <i class="bi bi-box-arrow-up-right"></i>
                        Ver/Descargar informe
                      </a>
                      <a href="{{route('asesorado.comments', $informe->id)}}" class="btn btn-sm btn-outline-dark mt-1"><i class="bi bi-card-checklist"></i> Revisar/Calificar</a>
                    
                    </p>
                    
                  </div>
                </div><!-- End activity item-->
              @endif
            @endforeach
          </div>
        </div>
      </div><!-- End Entregables -->
    </div> <!-- End Informe parcial -->



        <!-- Informe Final -->
        <div class="col-lg-6">
          <!-- Entregables -->
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between  align-items-center">
                <h5 class="card-title">Informe final <span>| Historial</span></h5>
              </div>
              <div class="activity">
                @foreach ($proyecto->informes->reverse() as $informe)
                  @if ($informe->tipo == "Informe Final")
                    <div class="activity-item d-flex">
                      <div class="activite-label">{{$informe->created_at->diffForHumans()}}</div>
                      <i class='bi bi-circle-fill activity-badge text-secondary align-self-start'></i>
                      <div class="activity-content">
                        <b>{{$informe->nombre_informe}}</b>
                        <br>
                        {{$informe->descripcion}}
                        <p>
                          <small>Revisión del asesor: <span class="badge rounded-pill bg-@if($informe->estado_asesor=="Pendiente"){{'secondary'}}@elseif($informe->estado_asesor=="Rechazado"){{'danger'}}@elseif($informe->estado_asesor=="Observado"){{'warning'}}@elseif($informe->estado_asesor=="Aceptado"){{'primary'}}@elseif($informe->estado_asesor=="Publicado"){{'success'}}@endif">
                            <i class="bi bi-@if($informe->estado_asesor=="Pendiente"){{'circle'}}@elseif($informe->estado_asesor=="Rechazado"){{'x-circle'}}@elseif($informe->estado_asesor=="Observado"){{'exclamation-triangle'}}@elseif($informe->estado_asesor=="Aceptado"){{'check-circle'}}@elseif($informe->estado_asesor=="Publicado"){{'file-earmark-check'}}@endif"></i> {{$informe->estado_asesor}}</span>
                          </small>
                          <br>
                        </p>
                        <p>
                          <a href="{{asset('files/informes/'.$informe->archivo)}}" target="_blank" class="btn btn-sm btn-outline-success">
                            <i class="bi bi-box-arrow-up-right"></i>
                            Ver/Descargar informe
                          </a>
                          <a href="{{route('asesorado.comments', $informe->id)}}" class="btn btn-sm btn-outline-dark mt-1"><i class="bi bi-card-checklist"></i> Revisar/Calificar</a>
                        
                        </p>
                        
                      </div>
                    </div><!-- End activity item-->
                  @endif
                @endforeach
                </div>
            </div>
            
          </div><!-- End Entregables -->
        </div> <!-- End Informe Final -->
    

  </div>
  </div>
</section>






@endsection