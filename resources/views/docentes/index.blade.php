

@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <h1>Gestión de docentes</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Lista de docentes</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">



      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between  align-items-center">
            <h5 class="card-title">Docentes</h5>            
              <a href="{{route('docentes.create')}}" class="btn btn-outline-primary " ><i class="bi bi-person-plus-fill me-1"></i> Nuevo docente</a>
          </div>

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

              @foreach ($docentes as $docente)

                <tr>
                  <th scope="row">{{$docente->id}}</th>
                  <td>{{$docente->nombres}}</td>
                  <td>{{$docente->apellidos}}</td>
                  <td>{{$docente->dni}}</td>
                  <td>
                    @if ($docente->estado == 'Activo')
                      <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Activo</span>
                    @else
                      <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i> Inactivo</span>
                    @endif
                  </td>
                  
                  <td>
                    <a href="{{route('docentes.edit', $docente->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
 
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$docente->id}}">
                      <i class="bi bi-trash"></i>
                    </button>
                </td>
                @include('docentes.modal')
                </tr>
                    
              @endforeach

            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>






@endsection