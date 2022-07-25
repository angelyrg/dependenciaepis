

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
            <div class="row ">
              <div class="col-2 ">
                <i class="bi bi-chat-right-quote-fill"></i>
              </div>
              <div class="col-10 ">
                <h3 class="p-0 m-0">{{$proyecto->nombre_grupo}}</h3>
              </div>

            </div>

            <p class="card-title mt-3">Proyecto</p>
            <p>{{$proyecto->nombre_proyecto}}</p>

            <p class="card-title mt-3">Descripción</p>
            <p>{{$proyecto->descripcion}}</p>

            <p class="card-title mt-3">Modalidad</p>
            <p>{{$proyecto->modalidad->nombre}}</p>

            <p class="card-title mt-3">Asesores</p>
            
            <ul>
              @foreach ($proyecto->asesores as $asesor)
                <li><p>{{$asesor->nombres." ".$asesor->apellidos}}</p></li>
              @endforeach
             
            </ul>
            

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

