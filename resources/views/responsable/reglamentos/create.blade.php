
@extends('layouts.niceadmin')

@section('content')

<div class="pagetitle">
  <h1>Gestión de reglamentos</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item">Reglamentos</li>
      <li class="breadcrumb-item active">Registrar reglamento</li>

    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Publicar nuevo reglamento</h5>

          <!-- Custom Styled Validation -->
          <form action="{{route('reglamentos.store')}}" method="POST" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
            @csrf

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
          
            <div class="col-md-12">
              <label for="validationCustom01" class="form-label">Reglamento</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-file-earmark-text-fill"></i></span>
                <input type="text" class="form-control" name="nombre_reglamento" value="{{old('nombre_reglamento')}}" placeholder="Nombre de la reglamento" id="validationCustom01" required >
                <div class="invalid-feedback">
                  Por favor ingrese el nombre del reglamento.
                </div>
              </div>
            </div> <!--End Input Nombre-->

            <div class="col-md-12">
              <label for="validationCustom02" class="form-label">Descripción</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-file-text"></i></span>
                <textarea name="descripcion" class="form-control" id="validationCustom02" required cols="30" rows="2">{{old('descripcion')}}</textarea>
                <div class="invalid-feedback">
                  Por favor ingrese la descripción del reglamento.
                </div>
              </div>
            </div> <!--End Input Descripcion-->

            <div class="col-md-12">
              <label for="validationCustom01" class="form-label">Archivo del reglamento <span class="badge border-light border-1 text-info">* .pdf</span></label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-file-pdf"></i></span>
                <input type="file" class="form-control" name="archivo" id="validationCustom01" required >
                <div class="invalid-feedback">
                  Por favor carga el documento del reglamento.
                </div>
              </div>
            </div> <!--End Input Nombre-->


            
            <div class="col-12 d-flex justify-content-center mt-4">
              <a href="{{route('reglamentos.index')}}" class="btn btn-secondary m-2 " ><i class="bi bi-x me-1"></i> Cancelar</a>

              <button class="btn btn-primary m-2" type="submit"><i class="bi bi-person-check-fill me-1"></i> Guardar datos</button>
            </div>
            
          </form><!-- End Form -->

        </div>
      </div>

    </div>
  </div>
</section>






@endsection