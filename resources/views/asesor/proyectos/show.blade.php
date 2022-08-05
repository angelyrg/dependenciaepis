

@extends('layouts.niceadmin')

@section('content')

<div class="pagetitle">
  <div class="row d-flex justify-content-between">
    <div class="col">

      <h1>Proyectos asesorados</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item">Proyectos</li>
          <li class="breadcrumb-item active">Detalles del proyecto</li>
    
        </ol>
      </nav>
    </div>
    <div class="col-12 col-md-3 d-flex align-items-end justify-content-end">
      <a href="{{route('aproyectos.index')}}" class="btn btn-outline-primary "><i class="bi bi-arrow-left-circle-fill"></i> Volver a proyectos</a>
    </div>
    
  </div>
</div><!-- End Page Title -->

<section class="section contact">


  <div class="row">

    <div class="col-lg-5">
      <div class="row">
        <div class="col-lg-12">
          <div class="info-box card">
            <div class="row d-flex align-items-start">
              <div class="col-2 ">
                <i class="bi bi-chat-right-quote-fill"></i>
              </div>
              <div class="col-10 mt-0">
                <small>Grupo {{$proyecto->modalidad_grupo}}</small>
                <h3 class="p-0 m-0">{{$proyecto->nombre_grupo}}</h3>
              </div>
            </div>

            <?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?> <!-- Necesario para tener los meses del año en español -->

            <p class="card-title mt-3">Proyecto</p>
            <p>{{$proyecto->nombre_proyecto}}</p>

            <p class="card-title mt-3">Modalidad</p>
            <p>{{$proyecto->modalidad->nombre}}</p>
            
            <p class="card-title mt-3">Duración del proyecto</p>
            <p>{{$meses[date('m', strtotime($proyecto->fecha_inicio))-1]." ".date('Y', strtotime($proyecto->fecha_inicio))." - ".$meses[date('m', strtotime($proyecto->fecha_fin))-1]." ".date('Y', strtotime($proyecto->fecha_fin))}}</p>

            <p class="card-title mt-3">Integrantes</p>
            <p>{{count($proyecto->miembros)}}</p>

            <p class="card-title mt-3">Asesores</p>            
            <ul class="mb-0">
              @foreach ($proyecto->asesores as $asesor)
                <li><p>{{$asesor->nombres." ".$asesor->apellidos}}</p></li>
              @endforeach
            </ul>

            @if ($proyecto->estado != "Inicio")
              <p class="card-title mt-3">Informes</p>
              <ul class="mb-0">
                @foreach ($proyecto->informes as $informe)
                  @if ($informe->estado == "Publicado")                    
                    <li><a href="{{asset('files/informes/'.$informe->archivo)}}" target="_blank">{{$informe->nombre_informe}}</a></li>
                  @endif
                @endforeach
              </ul>
            @endif

            @if (count($proyecto->documentos) > 0)
              <p class="card-title mt-3">Documentos del proyecto</p>
              <ul class="mb-0">
                @foreach ($proyecto->documentos as $documento)
                <li>
                  <a href="{{asset('files/documentos/'.$documento->archivo)}}" target="_blank" >{{$documento->nombre_documento}}</a>
                </li>                    
                @endforeach
              </ul>
            @endif



            

          </div>
          
        </div>
      </div>
    </div>

    <div class="col-lg-7">
      <div class="row">
        <div class="card">
          <div class="card-body">

            <h5 class="card-title">Estudiantes integrantes del grupo</h5>
            

            <div class="table-responsive">

              <!-- Table with stripped rows -->
              <table class="table table-sm ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Código</th>
                    <th scope="col">Cargo</th>
                  </tr>
                </thead>
                <tbody>

                  <?php $c = 0; ?>
                  @foreach ($proyecto->miembros as $estudiante)
                    <?php $c++; ?>

                    <tr>
                      <th scope="row">{{$c}}</th>
                      <td>{{$estudiante->nombres}}</td>
                      <td>{{$estudiante->apellidos}}</td>
                      <td>{{$estudiante->codigo_matricula}}</td>
                      <td>{{$estudiante->cargo->cargo}}</td>
                      
                    </tr>
                        
                  @endforeach

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>

          </div>

        </div> <!--End Card Integrante -->

      </div>
    </div>

  </div>
  
</section>

@endsection

