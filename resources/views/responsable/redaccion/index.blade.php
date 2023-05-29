

@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

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
    <div class="col-12 col-md-3 d-flex align-items-end justify-content-end">
      <a href="{{route('proyectos.index')}}" class="btn btn-outline-primary "><i class="bi bi-arrow-left-circle-fill"></i>  Todos los proyectos</a>
    </div>
    
  </div>
</div><!-- End Page Title -->

<section class="section contact">


  <div class="row">

    <div class="col-lg-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="info-box card">

            <div class="row d-flex align-items-start">
              <div class="col-2 ">
                <i class="bi bi-chat-right-quote-fill"></i>
              </div>
              <div class="col-10 mt-0">
                <small>Grupo </small>
                <h3 class="p-0 m-0">Nombre grupo</h3>
              </div>
            </div>
            <p class="card-title mt-3">Proyecto</p>
            <p>NOmbre proyecto</p>

            <div class="d-flex justify-content-end mt-1 ">

              <a href="{{route('redaccion.create')}}" class="btn btn-sm btn-info">Crear un nuevo informe</a>
              <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modal-upload-document">
                Subir archivo
              </button>
            </div>


          </div>
          
        </div>
      </div>
    </div>

    <div class="col-lg-8">

      <div class="col-lg-12">

        <div class="row">
          <div class="card">
            <div class="card-body">

              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Ejecutores del proyecto</h5>
                

              </div>

              <div class="table-responsive">

                <!-- Table with stripped rows -->
                <table class="table table-sm ">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombres</th>
                      <th scope="col">Apellidos</th>
                      
                      <th scope="col">Cargo</th>
                      <th>Opt</th>
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

  </div>
  
</section>

@endsection

