
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
            <h5 class="card-title">{{$ejecutor->proyecto->nombre_proyecto }}<span>| Informes</span> </h5>
            @if ($ejecutor->proyecto->estado != "Completado" && $ejecutor->cargo->cargo == "Presidente(a)")                
              {{-- <a href="{{route('informes.create')}}" class="btn btn-outline-primary " ><i class="bi bi-person-plus-fill me-1"></i> Subir informe</a> --}}

              <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-upload-informe">
                <i class="bi bi-file-earmark-arrow-up me-1"></i> Subir informe
              </button> 
              @include('ejecutor.informes.upload')


            @endif
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

    <!-- Informe parcial -->
    <div class="col-lg-6">
      <!-- Entregables -->
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between  align-items-center">
            <h5 class="card-title">Informe parcial <span>| Historial</span></h5>
          </div>
          <div class="activity">
            @foreach ($ejecutor->proyecto->informes->reverse() as $informe)
              @if ($informe->tipo == "Informe Parcial")
                <div class="activity-item d-flex">
                  <div class="activite-label">{{$informe->created_at->diffForHumans()}}</div>
                  <i class='bi bi-circle-fill activity-badge text-secondary align-self-start'></i>
                  <div class="activity-content">
                    <b>{{$informe->nombre_informe}}</b>
                    <br>
                    {{$informe->descripcion}}
                    <p>
                      <small>Revisión del asesor: 
                        <span class="badge rounded-pill bg-@if($informe->estado_asesor=="Pendiente"){{'secondary'}}@elseif($informe->estado_asesor=="Rechazado"){{'danger'}}@elseif($informe->estado_asesor=="Observado"){{'warning'}}@elseif($informe->estado_asesor=="Aceptado"){{'primary'}}@endif">
                        <i class="bi bi-@if($informe->estado_asesor=="Pendiente"){{'circle'}}@elseif($informe->estado_asesor=="Rechazado"){{'x-circle'}}@elseif($informe->estado_asesor=="Observado"){{'exclamation-triangle'}}@elseif($informe->estado_asesor=="Aceptado"){{'check-circle'}}@endif"></i> {{$informe->estado_asesor}}</span>
                      </small>
                      @if ($informe->estado != null)
                        <br>
                        <small>Revisión del responsable: 
                          <span class="badge rounded-pill bg-@if($informe->estado=="Pendiente"){{'secondary'}}@elseif($informe->estado=="Devuelto"){{'danger'}}@elseif($informe->estado=="Publicado"){{'success'}}@endif">
                          <i class="bi bi-@if($informe->estado=="Pendiente"){{'circle'}}@elseif($informe->estado=="Devuelto"){{'x-circle'}}@elseif($informe->estado=="Publicado"){{'file-earmark-check'}}@endif"></i> {{$informe->estado}}</span>
                        </small>
                      @endif
                      <br>
                      <a href="{{route('informes.show', $informe->id)}}" class="btn btn-sm btn-outline-dark mt-1"><i class="bi bi-card-checklist"></i> Más detalles</a>
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
            @foreach ($ejecutor->proyecto->informes->reverse() as $informe)
              @if ($informe->tipo == "Informe Final")
                <div class="activity-item d-flex">
                  <div class="activite-label">{{$informe->created_at->diffForHumans()}}</div>
                  <i class='bi bi-circle-fill activity-badge text-secondary align-self-start'></i>
                  <div class="activity-content">
                    <b>{{$informe->nombre_informe}}</b>
                    <br>
                    {{$informe->descripcion}}
                    <p>
                      <small>Revisión del asesor: 
                        <span class="badge rounded-pill bg-@if($informe->estado_asesor=="Pendiente"){{'secondary'}}@elseif($informe->estado_asesor=="Rechazado"){{'danger'}}@elseif($informe->estado_asesor=="Observado"){{'warning'}}@elseif($informe->estado_asesor=="Aceptado"){{'primary'}}@endif">
                        <i class="bi bi-@if($informe->estado_asesor=="Pendiente"){{'circle'}}@elseif($informe->estado_asesor=="Rechazado"){{'x-circle'}}@elseif($informe->estado_asesor=="Observado"){{'exclamation-triangle'}}@elseif($informe->estado_asesor=="Aceptado"){{'check-circle'}}@endif"></i> {{$informe->estado_asesor}}</span>
                      </small>
                      @if ($informe->estado != null)
                        <br>
                        <small>Revisión del responsable: 
                          <span class="badge rounded-pill bg-@if($informe->estado=="Pendiente"){{'secondary'}}@elseif($informe->estado=="Devuelto"){{'danger'}}@elseif($informe->estado=="Publicado"){{'success'}}@endif">
                          <i class="bi bi-@if($informe->estado=="Pendiente"){{'circle'}}@elseif($informe->estado=="Devuelto"){{'x-circle'}}@elseif($informe->estado=="Publicado"){{'file-earmark-check'}}@endif"></i> {{$informe->estado}}</span>
                        </small>
                      @endif
                      <br>
                      <a href="{{route('informes.show', $informe->id)}}" class="btn btn-sm btn-outline-dark mt-1"><i class="bi bi-card-checklist"></i> Más detalles</a>
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