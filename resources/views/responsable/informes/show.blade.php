
@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')


<div class="pagetitle">
  <h1>Informes</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Detalle del informe</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">

  <div class="row">

    <!-- Informe parcial -->
    <div class="col-lg-8 offset-lg-2">
      <!-- Entregables -->
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title">{{$informe->proyecto->nombre_proyecto}} </h5>
            <a href="{{route('responsable.informes.index')}}" class="btn btn-outline-primary"><i class="bi bi-arrow-90deg-left"></i> Volver</a>
          </div>
          <div class="activity">
            <div class="activity-item d-flex">
              <div class="activite-label">{{$informe->updated_at->diffForHumans()}}</div>
              <i class='bi bi-circle-fill activity-badge text-secondary align-self-start'></i>
              <div class="activity-content">
                <b >{{$informe->tipo}}</b><br>
                <br>
                <p>
                  <small>Revisión del asesor: <span class="badge bg-@if($informe->estado_asesor=="Pendiente"){{'secondary'}}@elseif($informe->estado_asesor=="Rechazado"){{'danger'}}@elseif($informe->estado_asesor=="Observado"){{'warning'}}@elseif($informe->estado_asesor=="Aceptado"){{'primary'}}@elseif($informe->estado_asesor=="Publicado"){{'success'}}@endif">
                    <i class="bi bi-@if($informe->estado_asesor=="Pendiente"){{'circle'}}@elseif($informe->estado_asesor=="Rechazado"){{'x-circle'}}@elseif($informe->estado_asesor=="Observado"){{'exclamation-triangle'}}@elseif($informe->estado_asesor=="Aceptado"){{'check-circle'}}@elseif($informe->estado_asesor=="Publicado"){{'file-earmark-check'}}@endif"></i> {{$informe->estado_asesor}}</span>
                  </small>
                </p>
                <p>
                  <small>Revisión responsable: 
                    <span class="badge rounded-pill bg-@if($informe->estado=="Pendiente"){{'secondary'}}@elseif($informe->estado=="Devuelto"){{'danger'}}@elseif($informe->estado=="Publicado"){{'success'}}@endif">
                    <i class="bi bi-@if($informe->estado=="Pendiente"){{'circle'}}@elseif($informe->estado=="Devuelto"){{'x-circle'}}@elseif($informe->estado=="Publicado"){{'file-earmark-check'}}@endif"></i> {{$informe->estado}}</span>
                  </small>
                </p>
                <p>
                  <a href="{{asset('files/informes/'.$informe->archivo)}}" target="_blank" class="btn btn-sm btn-outline-success">
                    <i class="bi bi-box-arrow-up-right"></i>  Ver/Descargar informe
                  </a>                
                </p>

                @if ($informe->estado != "Publicado")
                  <div class="row">
                    <form action="{{route('responsable.informes.update', $informe->id)}}" method="post"  class="row g-3 needs-validation mt-2 " >
                      @csrf
                      @method('PUT')

                      <p for="validationCustom04" class="form-label">Revisar informe como: </p>
                      <div class="col-md-8 mt-0">
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-toggle-on"></i></span>
                          <select class="form-select" name="estado" id="validationCustom04" required>
                            @if ($informe->estado == "Devuelto")
                              <option selected>Devuelto</option>
                              <option>Publicado</option>
                            @elseif ($informe->estado == "Publicado")
                              <option >Devuelto</option>
                              <option selected>Publicado</option>
                            @else
                              <option selected disabled value="">Seleccione...</option>   
                              <option>Devuelto</option>
                              <option>Publicado</option>
                            @endif
                          </select>
                          <div class="invalid-feedback">
                            Por favor seleccione una opción.
                          </div>
                        </div>
                      </div>
        
                      <div class="col-4 mt-0">  
                        <button type="submit" class="btn  btn-primary">
                          <i class="bi bi-check-square"></i> Guardar
                        </button>
                      </div>
                      
                    </form>
                  </div>
                    
                @endif

                
              </div>
            </div><!-- End activity item-->
           
          </div>
        </div>
      </div><!-- End Entregables -->
    </div> <!-- End Informe parcial -->

  </div>
  </div>
</section>






@endsection