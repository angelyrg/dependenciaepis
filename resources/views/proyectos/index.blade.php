

@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <h1>Gestión de proyectos</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Lista de proyectos</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between  align-items-center">
            <h5 class="card-title">Proyectos</h5>            
              <a href="{{route('proyectos.create')}}" class="btn btn-outline-primary " ><i class="bi bi-person-plus-fill me-1"></i> Nuevo proyecto</a>
          </div>

          <!-- Bordered Tabs Justified -->
          <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Servicio Social Universitario</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Proyección Social</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">	Extensión Cultural</button>
            </li>
          </ul>
          <div class="tab-content pt-2" id="borderedTabJustifiedContent">
            <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">

              <table class="table datatable mt-2">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Código</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Nombre del proyecto</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Modalidad</th>
                    {{-- <th scope="col">Estado</th> --}}
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
    
                  @foreach ($proyectos as $proyecto)

                    @if ($proyecto->modalidad_id == 1)
                      <tr>
                        <th scope="row">{{$proyecto->id}}</th>
                        <td>{{$proyecto->codigo}}</td>
                        <td>{{$proyecto->nombre_grupo}}</td>
                        <td>{{$proyecto->nombre_proyecto}}</td>
                        <td>{{$proyecto->descripcion}}</td>
                        <td>{{$proyecto->modalidad->nombre}}</td>
                        {{-- <td>
                          @if ($proyecto->estado == 'Activo')
                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Activo</span>
                          @else
                            <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i> Inactivo</span>
                          @endif
                        </td> --}}
                        
                        <td>
                          <a href="{{route('proyectos.edit', $proyecto->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
      
                          <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$proyecto->id}}">
                            <i class="bi bi-trash"></i>
                          </button>
                      </td>
                      @include('proyectos.modal')
                      </tr>
                    @endif

                  @endforeach
    
                </tbody>
              </table>
              <!-- End Table -->

            </div>
            <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">

              <table class="table datatable mt-2">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Código</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Nombre del proyecto</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Modalidad</th>
                    {{-- <th scope="col">Estado</th> --}}
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
    
                  @foreach ($proyectos as $proyecto)

                    @if ($proyecto->modalidad_id == 2)
                      <tr>
                        <th scope="row">{{$proyecto->id}}</th>
                        <td>{{$proyecto->codigo}}</td>
                        <td>{{$proyecto->nombre_grupo}}</td>
                        <td>{{$proyecto->nombre_proyecto}}</td>
                        <td>{{$proyecto->descripcion}}</td>
                        <td>{{$proyecto->modalidad->nombre}}</td>
                        {{-- <td>
                          @if ($proyecto->estado == 'Activo')
                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Activo</span>
                          @else
                            <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i> Inactivo</span>
                          @endif
                        </td> --}}
                        
                        <td>
                          <a href="{{route('proyectos.edit', $proyecto->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
      
                          <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$proyecto->id}}">
                            <i class="bi bi-trash"></i>
                          </button>
                      </td>
                      @include('proyectos.modal')
                      </tr>
                    @endif

                  @endforeach
    
                </tbody>
              </table>
              <!-- End Table -->

            </div>
            <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">

              <table class="table datatable mt-2">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Código</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Nombre del proyecto</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Modalidad</th>
                    {{-- <th scope="col">Estado</th> --}}
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
    
                  @foreach ($proyectos as $proyecto)

                    @if ($proyecto->modalidad_id == 3)
                      <tr>
                        <th scope="row">{{$proyecto->id}}</th>
                        <td>{{$proyecto->codigo}}</td>
                        <td>{{$proyecto->nombre_grupo}}</td>
                        <td>{{$proyecto->nombre_proyecto}}</td>
                        <td>{{$proyecto->descripcion}}</td>
                        <td>{{$proyecto->modalidad->nombre}}</td>
                        {{-- <td>
                          @if ($proyecto->estado == 'Activo')
                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Activo</span>
                          @else
                            <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i> Inactivo</span>
                          @endif
                        </td> --}}
                        
                        <td>
                          <a href="{{route('proyectos.edit', $proyecto->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
      
                          <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$proyecto->id}}">
                            <i class="bi bi-trash"></i>
                          </button>
                      </td>
                      @include('proyectos.modal')
                      </tr>
                    @endif

                  @endforeach
    
                </tbody>
              </table>
              <!-- End Table -->

            </div>
          </div><!-- End Bordered Tabs Justified -->

        </div>
      </div> <!-- End Card -->


    </div>
  </div>
</section>






@endsection