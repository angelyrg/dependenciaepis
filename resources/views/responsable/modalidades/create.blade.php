
@extends('layouts.niceadmin')

@section('content')

<div class="pagetitle">
  <h1>Gestión de modalidades</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item">Modalidades</li>
      <li class="breadcrumb-item active">Registrar modalidad</li>

    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Registrar nueva modalidad</h5>

          <!-- Custom Styled Validation -->
          <form action="{{route('modalidads.store')}}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf

            <hr class="dropdown-divider">

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="col-md-12">
              <label for="validationCustom01" class="form-label">Modalidad</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-chat-right-quote-fill"></i></span>
                <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}" placeholder="Nombre de la modalidad" id="validationCustom01" required autocomplete="off">
                <div class="invalid-feedback">
                  Por favor ingrese el nombre de la modalidad.
                </div>
              </div>
            </div> <!--End Input Nombre-->


            <div class="col-md-12">
              <label for="validationCustom04" class="form-label">Estado</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-toggle-on"></i></span>
                <select class="form-select" name="estado" id="validationCustom04" required>
                  @if (old('estado') == "Activo")
                    <option selected>Activo</option>
                    <option>Inactivo</option>
                  @elseif (old('estado') == "Inactivo")
                    <option>Activo</option>
                    <option selected>Inactivo</option>
                  @else
                    <option>Activo</option>
                    <option>Inactivo</option>
                  @endif
                </select>
                <div class="invalid-feedback">
                  Por favor seleccion un estado.
                </div>
              </div>
            </div> <!--End Choose Estado-->
            
            <div class="col-12 d-flex justify-content-center mt-4">
              <a href="{{route('modalidads.index')}}" class="btn btn-secondary m-2 " ><i class="bi bi-x me-1"></i> Cancelar</a>

              <button class="btn btn-primary m-2" type="submit"><i class="bi bi-person-check-fill me-1"></i> Guardar datos</button>
            </div>
            
          </form><!-- End Form -->

        </div>
      </div>

    </div>
  </div>
</section>






@endsection