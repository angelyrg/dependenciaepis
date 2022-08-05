

@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <div class="row d-flex justify-content-between">
    <div class="col">

      <h1>Gestión de proyectos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item">Proyectos</li>
          <li class="breadcrumb-item active">Detalles del proyecto</li>
        </ol>
      </nav>
    </div>
    <div class="col-12 col-md-3 d-flex align-items-end justify-content-end">
      <a href="{{route('proyectos.index')}}" class="btn btn-outline-primary "><i class="bi bi-arrow-left-circle-fill"></i>  Todos los proyectos</a>
    </div>
    
  </div>
</div><!-- End Page Title -->

<section class="section contact">


  <div class="row">

    <div class="col-lg-4">
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
                    <li>
                      <a href="{{asset('files/informes/'.$informe->archivo)}}" target="_blank" >{{$informe->tipo}}</a>
                    </li>                    
                  @endif
                @endforeach
              </ul>
            @endif

            @if (count($proyecto->documentos) > 0)
              <p class="card-title mt-3">Documentos del proyecto</p>
              <table class="table table-sm table-hover">
                @foreach ($proyecto->documentos as $documento)                  
                  <tr>
                    <td>
                      <a href="{{asset('files/documentos/'.$documento->archivo)}}" target="_blank" >{{$documento->nombre_documento}}</a>
                    </td>
                    <td>
                      
                      <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-document-{{$documento->id}}">
                          Eliminar 
                      </button>
                      @include('responsable.proyectos.modal-delete-document')
                    </td>
                  </tr>
                @endforeach
              </table>
             
            @endif



            <div class="d-flex justify-content-end mt-1 ">

              <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modal-upload-document">
                Subir archivo
              </button>
              @include('responsable.proyectos.upload-document')
            </div>


          </div>
          
        </div>
      </div>
    </div>

    <div class="col-lg-8">

      <div class="col-lg-12">

        <div class="row">
          <div class="card">
            <div class="card-body">

              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Ejecutores del proyecto</h5>
                
                @if ($proyecto->modalidad->id == 1 && count($proyecto->miembros) < 12 )

                  <a href="{{route('ejecutores.create', ["p_id" => $proyecto->id] )}}" class="btn btn-sm btn-primary"><i class=" bi bi-person-plus-fill"></i> Agregar</a>

                @elseif ($proyecto->modalidad->id == 2 && count($proyecto->miembros) < 40 )

                  <a href="{{route('ejecutores.create', ["p_id" => $proyecto->id] )}}" class="btn btn-sm btn-primary"><i class=" bi bi-person-plus-fill"></i> Agregar</a>

                @elseif ($proyecto->modalidad->id == 3 )
                  
                  <a href="{{route('ejecutores.create', ["p_id" => $proyecto->id] )}}" class="btn btn-sm btn-primary"><i class=" bi bi-person-plus-fill"></i> Agregar</a>

                @endif



              </div>

              <div class="table-responsive">

                <!-- Table with stripped rows -->
                <table class="table table-sm ">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombres</th>
                      <th scope="col">Apellidos</th>
                      @if (strtolower($proyecto->modalidad->nombre) == 'proyección social')
                        <th scope="col">DNI</th>
                      @else
                        <th scope="col">Código de Matrícula</th>
                        <th scope="col">Ciclo</th>
                      @endif
                      <th scope="col">Cargo</th>
                      <th>Opt</th>
                    </tr>
                  </thead>
                  <tbody>
  
                    <?php $c = 0; ?>
                    @foreach ($ejecutores as $ejecutor)
                      <?php $c++; ?>
  
                      <tr>
                        <th scope="row">{{$c}}</th>
                        <td>{{$ejecutor->nombres}}</td>
                        <td>{{$ejecutor->apellidos}}</td>
                        <td>{{$ejecutor->codigo_matricula}}</td>
                        @if (strtolower($proyecto->modalidad->nombre) != 'proyección social')
                          <td>{{$ejecutor->ciclo}}</td>
                        @endif
                        @if ($ejecutor->cargo_id != null)
                          <td>{{$ejecutor->cargo->cargo}}</td>
                        @else
                          <td></td>                            
                        @endif
                        <td>
                          <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$ejecutor->id}}">
                            <i class="bi bi-trash"></i>
                          </button>
                        </td>
                      </tr>
                      @include('responsable.proyectos.modal-delete-student')
                          
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

  </div>
  
</section>

@endsection

