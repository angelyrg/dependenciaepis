

@extends('layouts.niceadmin')

@section('content')

<div class="pagetitle">
  <div class="row d-flex justify-content-between">
    <div class="col">
      <h1>Informe</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item">Informe</li>
          <li class="breadcrumb-item active">Detalles del informe</li>
        </ol>
      </nav>
    </div>
    <div class="col-12 col-md-3 d-flex align-items-end justify-content-end">
      <a href="{{route('informes.index')}}" class="btn btn-outline-primary "><i class="bi bi-arrow-left-circle-fill"></i>  Todos los informes</a>
    </div>
  </div>

</div><!-- End Page Title -->

<section class="section dashboard">

  <div class="row">

    <div class="col-lg-5">

      <div class="row">
        <div class="col-lg-12">

          <div class="card info-card sales-card pt-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-journal-text"></i>
                </div>
                <div class="ps-2">
                  <h6>{{$informe->nombre_informe}}</h6>
                  <span class="text-success small pt-1 fw-bold">{{$informe->tipo}}</span>
                </div>
              </div>
            </div>
            <div class="card-footer px-4">
              <p class="card-title m-0 p-0">Descripción</p>
              <p >{{$informe->descripcion}}</p>
              
              <p class="card-title m-0 p-0">Tipo</p>
              <p>{{$informe->tipo}}</p>

              <p class="card-title m-0 p-0">Fecha</p>
              <p>{{$informe->created_at->format('d/m/Y')}} </p>
              
              <p class="card-title m-0 p-0">Revisión del asesor</p>
              <p>
                <span class="badge bg-@if($informe->estado=="Pendiente"){{'secondary'}}@elseif($informe->estado=="Rechazado"){{'danger'}}@elseif($informe->estado=="Observado"){{'warning'}}@elseif($informe->estado=="Aceptado"){{'primary'}}@elseif($informe->estado=="Publicado"){{'success'}}@endif">
                  {{$informe->estado}}
                </span>
              </p>

              <p class="card-title m-0 p-0">Informe</p>
              <p>
                <a href="{{asset('files/informes/'.$informe->archivo)}}" target="_blank" class="btn btn-sm btn-outline-dark">
                  Ver/Descargar informe
                </a>
              </p>

              <div class=" d-flex justify-content-end mt-4">
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-informe">
                  <i class="bi bi-trash"></i> Eliminar informe
                </button> 
                @include('estudiante.informes.modal')
              </div>


            </div>
          </div>

        </div>
      </div>
      

    </div>

    <div class="col-lg-7">
      <div class="row">
        <div class="card">
          <div class="card-body">

            <h5 class="card-title">Comentarios de los asesores</h5>
            
            <div class="table-responsive">
              <!-- Table with stripped rows -->
              <table class="table table-sm ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Código de Matrícula</th>
                  </tr>
                </thead>
                <tbody>



                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>

          </div>

        </div> <!--End Card Integrante -->

      </div>
    </div>

  </div>
  
</section>

@endsection

