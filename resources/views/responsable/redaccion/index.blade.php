

@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')
@include('responsable.redaccion.modal-create')

<div class="pagetitle">
  <div class="row d-flex justify-content-between">
    <div class="col">

      <h1>Redacción de informes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Redacción de informes</li>
        </ol>
      </nav>
    </div>
    
  </div>
</div><!-- End Page Title -->

<section class="section contact">


  <div class="row">

    <div class="col-lg-3">
      <div class="row">
        <div class="col-lg-12">
          <div class="info-box card">

            <div class="row d-flex align-items-start">
              <div class="col-2 ">
                <i class="bi bi-file-word"></i>
              </div>
              <div class="col-10 mt-0">
                <small>Redacción de informes</small>
              </div>
            </div>

            <div class="mt-1 text-center">
              <button type="button" class="btn rounded-3 mb-2 w-100 btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-redaccion-aprobacion">
                Aprobación e Inscripción
              </button>
            </div>
            <div class="mt-1 text-center">
              <button type="button" class="btn rounded-3 mb-2 btn-block btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-redaccion-parcial">
                Informe parcial
              </button>
            </div>
            <div class="mt-1 text-center">
              <button type="button" class="btn rounded-3 mb-2 btn-block btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-redaccion-final">
                Informe final
              </button>
            </div>
            <div class="mt-1 text-center">
              <button type="button" class="btn rounded-3 mb-2 btn-block btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-redaccion-especial">
                Casos especiales
              </button>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-9">

      <div class="col-lg-12">

        <div class="row">
          <div class="card">
            <div class="card-body">

              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Historial de informes</h5>
              </div>

              <div class="table-responsive ">

                <!-- Table with stripped rows -->
                <table class="table datatable table-sm ">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre del archivo</th>
                      <th>Fecha</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 0; ?>
                    @foreach ($redacciones as $redaccion)
                        <tr>                          
                          <td>{{$redaccion->id}}</th>
                          <td>
                            <a href="{{asset('files/redaccion/'.$redaccion->nombre_documento)}}" download target="_blank">
                              {{$redaccion->nombre_documento}}
                            </a>
                          </td>
                          <td>{{$redaccion->created_at}}</td>
                          @if ($i<3)
                          <td>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$redaccion->id}}">
                              <i class="bi bi-trash"></i>
                            </button>
                          </td>
                          @include('responsable.redaccion.modal-delete')
                          @endif
                        </tr>
                        <?php $i++; ?>
                    @endforeach
  
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
              </div>

            </div>

          </div> <!--End Card Integrante -->

        </div>


      
      </div>

    </div>

  </div>
  
</section>




@endsection

