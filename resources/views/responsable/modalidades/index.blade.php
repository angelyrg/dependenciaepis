

@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <h1>Gestión de Modalidades</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Lista de modalidades</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between  align-items-center">
            <h5 class="card-title">Modalidades</h5>            
              <a href="{{route('modalidads.create')}}" class="btn btn-outline-primary " ><i class="bi bi-person-plus-fill me-1"></i> Nueva modalidad</a>
          </div>

          <div class="table-responsive">
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre de Modalidad</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tbody>
  
                @foreach ($modalidades as $modalidad)
  
                  <tr>
                    <th scope="row">{{$modalidad->id}}</th>
                    <td>{{$modalidad->nombre}}</td>
                    <td>
                      @if ($modalidad->estado == 'Activo')
                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Activo</span>
                      @else
                        <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i> Inactivo</span>
                      @endif
                    </td>
                    
                    <td>
                      <a href="{{route('modalidads.edit', $modalidad->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
   
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$modalidad->id}}">
                        <i class="bi bi-trash"></i>
                      </button>
                  </td>
                  @include('responsable.modalidades.modal')
                  </tr>
                      
                @endforeach
  
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
          </div> <!-- End Responsive Table  -->

        </div>
      </div>

    </div>
  </div>
</section>






@endsection