

@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <h1>Gestión de ejecutores</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Lista de ejecutores</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between  align-items-center">
            <h5 class="card-title">Ejecutores</h5>            
            {{-- <a href="{{route('asesors.create')}}" class="btn btn-outline-primary " ><i class="bi bi-person-plus-fill me-1"></i> Nuevo asesor</a> --}}
          </div>

          <div class="table-responsive">
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombres</th>
                  <th scope="col">Apellidos</th>
                  <th scope="col">Código de Matrícula</th>
                  <th scope="col">Ciclo</th>
                  <th scope="col">Grupo</th>
                  <th scope="col">Opción</th>
                </tr>
              </thead>
              <tbody>
  
                @foreach ($ejecutores as $ejecutor)
  
                  <tr>
                    <th scope="row">{{$ejecutor->id}}</th>
                    <td>{{$ejecutor->nombres}}</td>
                    <td>{{$ejecutor->apellidos}}</td>
                    <td>{{$ejecutor->codigo_matricula}}</td>
                    <td>{{$ejecutor->ciclo}}</td>
                    <td>
                      <a href="{{route('proyectos.show', $ejecutor->proyecto->id)}}" class="fw-bold link-primary">{{$ejecutor->proyecto->nombre_grupo}}</a>
                    </td>
                    <td>                      
                      <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modal-restore-{{$ejecutor->id}}">
                        <i class="bi bi-lock"></i> Restablecer contraseña
                      </button>
                    </td>

                  @include('responsable.ejecutores.restore-password')

                  </tr>
                      
                @endforeach
  
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
          </div>

        </div>
      </div>

    </div>
  </div>
</section>






@endsection