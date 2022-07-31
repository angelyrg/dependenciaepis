

@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <h1>Gestión de Cargos</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Lista de cargos</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">

  <div class="row">
    <div class="col-lg-8 offset-lg-2">
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


  <div class="row">
    <div class="col-lg-8 offset-lg-2">

      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between  align-items-center">
            <h5 class="card-title">Cargos</h5>            
              
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-add-cargo">
                <i class="bi bi-plus-circle me-1"></i> Nueva cargo
              </button>
              @include('responsable.cargos.modal-create')
          </div>

          <div class="table-responsive">
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Cargo</th>
                  <th scope="col">Fecha agregado</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tbody>
  
                @foreach ($cargos as $cargo)
  
                  <tr>
                    <th scope="row">{{$cargo->id}}</th>
                    <td>{{$cargo->cargo}}</td>
                    <td>{{date('d/m/Y', strtotime($cargo->created_at))}}</td>

                    <td>
 
                      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$cargo->id}}">
                        <i class="bi bi-pencil-square"></i>
                      </button>
                      @include('responsable.cargos.modal-edit')

                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$cargo->id}}">
                        <i class="bi bi-trash"></i>
                      </button>
                      @include('responsable.cargos.modal-delete')
                  </td>
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