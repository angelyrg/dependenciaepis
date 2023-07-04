

@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <h1>Gestión de secretarias</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Listado</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between  align-items-center">
            <h5 class="card-title">Secretaría</h5>            
            <a href="{{route('secretarias.create')}}" class="btn btn-outline-primary " ><i class="bi bi-person-plus-fill me-1"></i> Nuevo</a>
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
                  <th scope="col">Opciones</th>
                </tr> 
              </thead>
              <tbody>
  
                @foreach ($secretarias as $secretaria)
                  <tr>
                    <th scope="row">{{$secretaria->id}}</th>
                    <td>{{$secretaria->nombres}}</td>
                    <td>{{$secretaria->apellidos}}</td>
                    <td>{{$secretaria->dni}}</td>                    
                    <td>

                      <a href="{{route('secretarias.edit', $secretaria->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
   
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$secretaria->id}}">
                        <i class="bi bi-trash"></i>
                      </button>

                      <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modal-restore-{{$secretaria->id}}">
                        <i class="bi bi-lock"></i> Restablecer contraseña
                      </button>

                  </td>
                </tr>
                @include('responsable.secretarias.restore-password')
                @include('responsable.secretarias.modal')
                
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

