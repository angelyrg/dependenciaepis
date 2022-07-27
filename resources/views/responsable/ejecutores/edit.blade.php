@extends('layouts.niceadmin')

@section('content')


<div class="pagetitle">
  <h1>Gestión de asesores</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item">Asesores</li>
      <li class="breadcrumb-item active">Editar</li>

    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Editar asesor</h5>

          <!-- Custom Styled Validation -->
          <form action="{{route('asesors.update', $asesor->id)}}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf
            @method('PUT')

            <hr class="dropdown-divider">

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
          
            <div class="col-md-6">
              <label for="validationCustom01" class="form-label">Nombres</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-bounding-box"></i></span>
                <input type="text" name="nombres" value="@if(!old('nombres')){{$asesor->nombres}}@else{{old('nombres')}}@endif" class="form-control" id="validationCustom01" required>
                <div class="invalid-feedback">
                  Por favor ingrese el nombre.
                </div>
              </div>
            </div> <!--End Input Nombre-->

            <div class="col-md-6">
              <label for="validationCustom02" class="form-label">Apellidos</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-lines-fill"></i></span>
                <input type="text" name="apellidos" value="@if(!old('apellidos')){{$asesor->apellidos}}@else{{old('apellidos')}}@endif" class="form-control"  id="validationCustom02"  required>
                <div class="invalid-feedback">
                  Por favor ingrese el apellido.
                </div>
              </div>
            </div> <!--End Input Apellido-->

            <div class="col-md-6">
              <label for="validationCustom03" class="form-label">DNI</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-credit-card-2-front-fill"></i></span>
                <input type="text" name="dni" value="@if(!old('dni')){{$asesor->dni}}@else{{old('dni')}}@endif" minlength="8" maxlength="8" class="form-control" required aria-describedby="inputGroupPrepend" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">  
                <div class="invalid-feedback">
                  Por favor ingrese un DNI válido.
                </div>
              </div>
            </div> <!--End Input DNI-->

            
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