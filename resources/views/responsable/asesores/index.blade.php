

@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <h1>Gestión de asesores</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Lista de asesores</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">



      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between  align-items-center">
            <h5 class="card-title">Asesores</h5>            
            <a href="{{route('asesors.create')}}" class="btn btn-outline-primary " ><i class="bi bi-person-plus-fill me-1"></i> Nuevo asesor</a>
          </div>

          <div class="table-responsive">
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombres</th>
                  <th scope="col">Apellidos</th>
                  <th scope="col">DNI</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Opciones</th>
                </tr> 
              </thead>
              <tbody>
  
                @foreach ($asesores as $asesor)
                  <tr>
                    <th scope="row">{{$asesor->id}}</th>
                    <td>{{$asesor->nombres}}</td>
                    <td>{{$asesor->apellidos}}</td>
                    <td>{{$asesor->dni}}</td>
  
                    <td>
                      @if ($asesor->ctd_asesorados < 2)
                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Disponible</span>
                      @else
                        <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i> No disponible</span>
                      @endif
                    </td>
                    
                    <td>

                      <a href="{{route('asesors.edit', $asesor->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
   
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$asesor->id}}">
                        <i class="bi bi-trash"></i>
                      </button>

                      <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modal-restore-{{$asesor->id}}">
                        <i class="bi bi-lock"></i> Restablecer contraseña
                      </button>

                  </td>
                </tr>
                @include('responsable.asesores.restore-password')
                @include('responsable.asesores.modal')
                
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

