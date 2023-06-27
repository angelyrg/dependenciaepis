

@extends('layouts.niceadmin')

@section('content')


<div class="pagetitle">
  <h1>Configuraciones generales</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Nueva configuración</li>

    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6 offset-lg-3 ">

      <div class="card">
        <div class="card-body ">
          <h5 class="card-title">Configuración general</h5>
          <hr class="dropdown-divider">

          <!-- Custom Styled Validation -->
          <form action="{{route('settings.store')}}" method="POST" class="row g-3 needs-validation px-5" novalidate>
            @csrf


            <div class="row">
              <div class="col-lg-12">
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
          

            <div class="col-md-12">
              <label for="validationCustom01" class="form-label">Año</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-bounding-box"></i></span>
                <input type="text" maxlength="4" minlength="4" class="form-control" name="year_settings" value="{{old('year_settings')}}" id="validationCustom01" required>
                <div class="invalid-feedback">
                  Por favor ingrese el año.
                </div>
              </div>
            </div>

            {{-- <div class="col-md-12">
              <label for="validationCustom02" class="form-label">Número de informe</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-lines-fill"></i></span>
                <input type="text" class="form-control" name="numero_informe" value="{{old('numero_informe')}}" id="validationCustom02" required >
                <div class="invalid-feedback">
                  Por favor ingrese el número de informe.
                </div>
              </div>
            </div> --}}

            <div class="col-md-12">
              <label for="validationCustom02" class="form-label">Nombre del director</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-lines-fill"></i></span>
                <input type="text" class="form-control" name="nombre_director" value="{{old('nombre_director')}}" id="validationCustom02" placeholder="Dr. ..." required >
                <div class="invalid-feedback">
                  Por favor ingrese el nombre del director.
                </div>
              </div>
            </div>

            <div class="col-12 d-flex justify-content-center mt-4">
              <a href="{{route('asesors.index')}}" class="btn btn-secondary m-2 " ><i class="bi bi-x me-1"></i> Cancelar</a>
              <button class="btn btn-primary m-2" type="submit"><i class="bi bi-person-check-fill me-1"></i> Guardar datos</button>
            </div>
            
          </form><!-- End Form -->

        </div>
      </div>

    </div>
  </div>
</section>






@endsection