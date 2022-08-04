

@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <h1>Gestión de Reglamentos</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Lista de reglamentos</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="dashboard">
  <div class="row">
    <div class="col-lg-12">



      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between  align-items-center">
            <h5 class="card-title">Reglamentos</h5>            
              <a href="{{route('reglamentos.create')}}" class="btn btn-outline-primary " ><i class="bi bi-person-plus-fill me-1"></i> Nuevo reglamento</a>
          </div>

          <div class="table-responsive">
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Reglamento</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Archivo</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tbody>
  
                @foreach ($reglamentos as $reglamento)
  
                  <tr>
                    <th scope="row">{{$reglamento->id}}</th>
                    <td>{{$reglamento->nombre_reglamento}}</td>
                    <td>{{$reglamento->descripcion}}</td>
                    <td>
                      <a href="{{asset('files/reglamentos/'.$reglamento->archivo)}}" target="_blank" class="btn btn-sm btn-success">
                        <i class="bi bi-box-arrow-up-right"> Ver archivo</i>
                      </a>
                    </td>

                    
                    <td>
                      <a href="{{route('reglamentos.edit', $reglamento->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
   
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$reglamento->id}}">
                        <i class="bi bi-trash"></i>
                      </button>
                  </td>
                  @include('responsable.reglamentos.modal')
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