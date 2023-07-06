

@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <h1>Gestión de Documentos generales</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Lista de documentos</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="dashboard">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between  align-items-center">
            <h5 class="card-title">Documentos</h5>            
              <a href="{{route('generaldocuments.create')}}" class="btn btn-outline-primary " ><i class="bi bi-person-plus-fill me-1"></i> Nuevo documento</a>
          </div>

          <div class="table-responsive">
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Documento</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Archivo</th>
                  @if (Auth::user()->rol == 'Responsable')
                    <th scope="col">Opciones</th>
                  @endif
                </tr>
              </thead>
              <tbody>
  
                @foreach ($generaldocuments as $documento)
  
                  <tr>
                    <th scope="row">{{$documento->id}}</th>
                    <td>{{$documento->nombre_documento}}</td>
                    <td>{{$documento->descripcion}}</td>
                    <td>
                      <a href="{{asset('files/documentos/'.$documento->archivo)}}" target="_blank" class="btn btn-sm btn-success">
                        <i class="bi bi-box-arrow-up-right"> Ver archivo</i>
                      </a>
                    </td>

                    @if (Auth::user()->rol == 'Responsable')
                      <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$documento->id}}">
                          <i class="bi bi-trash"></i>
                        </button>
                      </td>
                      @include('responsable.generaldocuments.modal-delete')
                    @endif

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