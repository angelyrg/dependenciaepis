

@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')


<div class="pagetitle">
  <div class="row d-flex justify-content-between">
    <div class="col">

      <h1>Proyecto</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item">Proyecto</li>
          <li class="breadcrumb-item active">Detalles del proyecto</li>
    
        </ol>
      </nav>
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
                <small>Grupo {{$ejecutor->proyecto->modalidad_grupo}}</small>
                <h3 class="p-0 m-0">{{$ejecutor->proyecto->nombre_grupo}}</h3>
              </div>
            </div>

            <?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?> <!-- Necesario para tener los meses del año en español -->

            <p class="card-title mt-3">Proyecto</p>
            <p>{{$ejecutor->proyecto->nombre_proyecto}}</p>

            <p class="card-title mt-3">Modalidad</p>
            <p>{{$ejecutor->proyecto->modalidad->nombre}}</p>
            
            <p class="card-title mt-3">Duración del proyecto</p>
            <p>{{$meses[date('m', strtotime($ejecutor->proyecto->fecha_inicio))-1]." ".date('Y', strtotime($ejecutor->proyecto->fecha_inicio))." - ".$meses[date('m', strtotime($ejecutor->proyecto->fecha_fin))-1]." ".date('Y', strtotime($ejecutor->proyecto->fecha_fin))}}</p>

            <p class="card-title mt-3">Integrantes</p>
            <p>{{count($ejecutor->proyecto->miembros)}}</p>

            <p class="card-title mt-3">Asesores</p>
            
            <ul>
              @foreach ($ejecutor->proyecto->asesores as $asesor)
                <li><p>{{$asesor->nombres." ".$asesor->apellidos}}</p></li>
              @endforeach

            </ul>

            @if (count($ejecutor->proyecto->documentos) > 0)
              <p class="card-title mt-3">Documentos del proyecto</p>
              <ul class="mb-0">
                @foreach ($ejecutor->proyecto->documentos as $documento)
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
                    <th scope="col">Código de Matrícula</th>
                    <th scope="col">Cargo</th>
                  </tr>
                </thead>
                <tbody>

                  <?php $c = 0; ?>
                  @foreach ($ejecutor->proyecto->miembros as $ejecutor)
                    <?php $c++; ?>

                    <tr>
                      <th scope="row">{{$c}}</th>
                      <td>{{$ejecutor->nombres}}</td>
                      <td>{{$ejecutor->apellidos}}</td>
                      <td>{{$ejecutor->codigo_matricula}}</td>
                      <td>{{$ejecutor->cargo->cargo}}</td>                      
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

