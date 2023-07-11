

@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <h1>Gestión de proyectos</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Lista de proyectos</li>
    </ol>
  </nav>
</div><!-- End Page Title -->



<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between  align-items-center">
            <h5 class="card-title">Proyectos</h5>
            @if (Auth::user()->rol == "Responsable")
              <a href="{{route('proyectos.create')}}" class="btn btn-outline-primary " ><i class="bi bi-person-plus-fill me-1"></i> Nuevo proyecto</a>
            @endif
          </div>

          <?php $active = "active"; ?>
          <!-- Bordered Tabs Justified -->
          <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
            @foreach ($modalidades as $modalidad)
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 {{$active}} " id="home-tab" data-bs-toggle="tab" data-bs-target="#modalidad-{{$modalidad->id}}" type="button" role="tab" aria-controls="home" aria-selected="true">
                  {{$modalidad->nombre}}  <span class="badge bg-primary badge-number">{{$modalidad->proyectos_count}}</span>
                </button>
                <?php $active = ""; ?>
              </li>
            @endforeach

          </ul>
          <div class="tab-content pt-2" id="borderedTabJustifiedContent">

            <?php $active = "show active"; ?>
            @foreach ($modalidades as $modalidad)
              <div class="tab-pane fade  {{$active}} " id="modalidad-{{$modalidad->id}}" role="tabpanel" aria-labelledby="profile-tab">
                <?php $active = ""; ?>
                {{$modalidad->nombre}}

                <div class="table-responsive">
                  <table class="table datatable mt-2">
                    <thead>
                      <tr>
                        <th scope="col">Grupo</th>
                        <th scope="col">Nombre del proyecto</th>
                        <th scope="col">Inicio</th>
                        <th scope="col">Finalización</th>
                        <th scope="col">N° Resolución</th>
                        <th scope="col">Estado</th>
                        @if (Auth::user()->rol == "Responsable")
                          <th scope="col">Opciones</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>

                      <?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?>  <!-- Necesario para tener los meses del año en español -->

                      @foreach ($proyectos as $proyecto)
  
                        @if ($proyecto->modalidad_id == $modalidad->id)
                          <tr>
                            <td>
                              <a href="{{route('proyectos.show', $proyecto->id)}}" class="fw-bold">{{$proyecto->nombre_grupo}}</a>
                            </td>
                            <td>
                              <a href="{{route('proyectos.show', $proyecto->id)}}" class="fw-bold">{{$proyecto->nombre_proyecto}}</a>
                            </td>
                            <td>{{$meses[date('m', strtotime($proyecto->fecha_inicio))-1]." ".date('Y', strtotime($proyecto->fecha_inicio))}}</td>
                            <td>{{$meses[date('m', strtotime($proyecto->fecha_fin))-1]." ".date('Y', strtotime($proyecto->fecha_fin))}}</td>
                            
                            <td>
                              @if (!isset($proyecto->resolucion_aprobacion))
                              <i>Pendiente</i>                                
                              @else
                              {{$proyecto->resolucion_aprobacion}}                                  
                              @endif
                            </td>

                            <td>
                              <span class="badge bg-@if($proyecto->estado=="Inscrito"){{'secondary'}}@elseif($proyecto->estado=="Inicio"){{'dark'}}@elseif($proyecto->estado=="Parcial"){{'warning'}}@elseif($proyecto->estado=="Completado"){{'success'}}@endif">
                                <i class="bi bi-journal-code"></i> 
                                {{$proyecto->estado}}
                              </span>
                            </td>
                            
                            @if (Auth::user()->rol == "Responsable")
                            <td>

                              {{-- <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modal-update-resolucion-{{$proyecto->id}}">
                                Resolución
                              </button> --}}

                              <a href="{{route('proyectos.edit', $proyecto->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                              
                              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$proyecto->id}}">
                                <i class="bi bi-trash"></i>
                              </button>
                          </td>
                            @endif
                          @include('responsable.proyectos.modal')
                          {{-- @include('responsable.proyectos.modal-update_resolucion') --}}
                          </tr>
                        @endif
  
                      @endforeach
        
                    </tbody>
                  </table>
                </div>
                <!-- End Table -->

              </div>

            @endforeach

        </div>
      </div> <!-- End Card -->


    </div>
  </div>
</section>






@endsection