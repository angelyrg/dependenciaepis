@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <div class="row d-flex justify-content-between">
    <div class="col">
      <h1>Informe</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item">Informe</li>
          <li class="breadcrumb-item active">Detalles del informe</li>
        </ol>
      </nav>
    </div>
    <div class="col-12 col-md-3 d-flex align-items-end justify-content-end">
      <a href="{{route('informes.index')}}" class="btn btn-outline-primary "><i class="bi bi-arrow-left-circle-fill"></i>  Volver a todos los informes</a>
    </div>
  </div>

</div><!-- End Page Title -->

<section class="section dashboard">

  <div class="row">

    <div class="col-lg-5">

      <div class="row">
        <div class="col-lg-12">

          <div class="card info-card sales-card pt-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-journal-text"></i>
                </div>
                <div class="ps-2">
                  <h6>{{$informe->nombre_informe}}</h6>
                  <span class="text-success small pt-1 fw-bold">{{$informe->tipo}}</span>
                </div>
              </div>
            </div>
            <div class="card-footer px-4">
              <p class="card-title m-0 p-0">Descripción</p>
              <p >{{$informe->descripcion}}</p>
              
              <p class="card-title m-0 p-0">Tipo</p>
              <p>{{$informe->tipo}}</p>

              <p class="card-title m-0 p-0">Fecha</p>
              <p>{{$informe->created_at->format('d/m/Y')}} </p>
              
              <p class="card-title m-0 p-0">Revisión del asesor</p>
              <p>
                <span class="badge bg-@if($informe->estado_asesor=="Pendiente"){{'secondary'}}@elseif($informe->estado_asesor=="Rechazado"){{'danger'}}@elseif($informe->estado_asesor=="Observado"){{'warning'}}@elseif($informe->estado_asesor=="Aceptado"){{'primary'}}@elseif($informe->estado_asesor=="Publicado"){{'success'}}@endif">
                  <i class="bi bi-@if($informe->estado_asesor=="Pendiente"){{'circle'}}@elseif($informe->estado_asesor=="Rechazado"){{'x-circle'}}@elseif($informe->estado_asesor=="Observado"){{'exclamation-triangle'}}@elseif($informe->estado_asesor=="Aceptado"){{'check-circle'}}@endif"></i> {{$informe->estado_asesor}}</span>
                </span>
              </p>

              <p class="card-title m-0 p-0">Informe</p>
              <p>
                <a href="{{asset('files/informes/'.$informe->archivo)}}" target="_blank" class="btn btn-sm btn-outline-dark">
                  Ver/Descargar informe
                </a>
              </p>
              <hr>

              @if ($informe->estado == null)
                <div class=" d-flex justify-content-between mt-4">
                  
                  @if ($informe->estado_asesor == "Aceptado" && $ejecutor->cargo->cargo == "Presidente(a)" )
                    <form action="{{route('informes.update', $informe->id)}}" method="post">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-sm btn-outline-success">
                        <i class="bi bi-check"></i> Enviar al responsable
                      </button>
                    </form>
                  @else
                    <div></div>
                  @endif


                  @if ($ejecutor->cargo->cargo == "Presidente(a)")

                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-informe">
                      <i class="bi bi-trash"></i> Eliminar informe
                    </button> 
                    @include('ejecutor.informes.modal')
                  @endif
                </div>
              @else
                <p>
                  Revisión del responsable: 
                  <span class="badge bg-@if($informe->estado=="Pendiente"){{'secondary'}}@elseif($informe->estado=="Devuelto"){{'danger'}}@elseif($informe->estado=="Publicado"){{'success'}}@endif">
                  <i class="bi bi-@if($informe->estado=="Pendiente"){{'circle'}}@elseif($informe->estado=="Devuelto"){{'x-circle'}}@elseif($informe->estado=="Publicado"){{'file-earmark-check'}}@endif"></i> {{$informe->estado}}</span>
                </p>
                  
              @endif




            </div>
          </div>

        </div>
      </div>
      

    </div>

    <div class="col-lg-7">
      <div class="row">
        <!-- Comentarios -->
        <div class="card">

          <div class="card-body pb-0">
            <h5 class="card-title">Revisiones de los asesores <span>| Comentarios</span></h5>

            <div class="news">

              @foreach ($comentarios as $comentario)
                <div class="row border py-1 rounded-3 mb-3">
                  <div class="col-2 card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-chat-left-text"></i>
                  </div>
                  <div class="col-10 ">
                    <b >{{$comentario->name}} <span class="badge bg-success ">{{$comentario->rol}}</span> </b> <span class="text-muted">| {{$comentario->created_at->diffForHumans()}}</span> <br>
                    <small class="py-5">{{$comentario->comentario}}</small><br>
                    @if ($comentario->archivo != null)                        
                      <div class="text-end ">
                        <a href="{{asset('files/informes/'.$comentario->archivo)}}" class="btn btn-sm btn-outline-success "><i class="bi bi-folder-symlink "></i> Archivo adjunto</a>
                      </div>
                    @endif
                  </div>
                </div>
              @endforeach



            </div><!-- End sidebar recent posts-->

          </div>

          <div class="card-footer bg-light ">

            <div class="row">
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
            </div> <!--End Mensajes de error-->
          
            
            <form action="{{route('comentarios.store')}}" method="post"  class="row g-3 needs-validation mt-2 " novalidate>
              @csrf

              <div class="row">                
                <div class="col-10">

                  <input type="hidden" name="informe_id" value="{{$informe->id}}">
                  
                  <div class="input-group has-validation">
                    <textarea name="comentario" class="form-control" id="validationCustom01" required cols="30" rows="2" placeholder="Agregar un comentario"></textarea>
                    <div class="invalid-feedback">
                      El contenido del comentario es obligatorio.
                    </div>
                  </div>

                  @if (Auth::user()->rol == 'Asesor')
                    <div class="input-group has-validation mt-2">
                      <div class="col-4">
                        <label for="archivo">Adjuntar archivo</label><br>
                      </div>
                      <input type="file" name="archivo" id="archivo" class="form-control" >
                    </div>                    
                  @endif

                </div>
                
                <div class="col-2 d-flex align-items-start">

                  <button type="submit" class="btn  btn-primary">
                    <i class="bi bi-send"></i> Enviar
                  </button>
                </div>
              </div>
            </form>

          </div>
        </div><!-- End Comentarios -->

      </div>
    </div>

  </div>
  
</section>

@endsection

