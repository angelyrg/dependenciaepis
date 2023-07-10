

@extends('layouts.niceadmin')

@section('content')


<div class="pagetitle">
  <h1>Visualizar proyectos</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Lista de proyectos</li>
    </ol>
  </nav>
</div><!-- End Page Title -->


<section class="section">
  <div class="row">
    <div class="col-lg-8 ">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Proyectos asignados</h5>

          <!-- List group Proyectos -->
          <ol class="list-group list-group-numbered">
            @foreach ($asesor->asesorados as $proyecto) 
              <a href="{{route('aproyectos.show', $proyecto->id)}}" class="link-primary">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">{{$proyecto->nombre_grupo}}</div>
                    <p class="">{{$proyecto->nombre_proyecto}}</p>
                    <div>
                      <span class="badge bg-primary ">{{$proyecto->modalidad->nombre}}</span>
                    </div>
                  </div>
                  <span class="badge bg-primary rounded-pill">{{count($proyecto->miembros)}} <i class="bi bi-people-fill"></i></span>
                </li>
              </a>               
            @endforeach
            
          </ol><!-- End List Group Proyectos -->

        </div>
      </div>


    </div>

    
  </div>
  </div>
</section>






@endsection