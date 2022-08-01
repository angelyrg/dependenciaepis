
@extends('layouts.niceadmin')

@section('content')

<div class="pagetitle">
  <h1>Gestión de informes</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item">Informes</li>
      <li class="breadcrumb-item active">Subir entregable</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">

      <div class="card">
        <div class="card-body">

          <div class="d-flex justify-content-between  align-items-center">
            <h5 class="card-title">Subir entregable  </h5>
            <span class="badge bg-primary"> <i class="bi bi-ui-checks"></i> 
              @if ($ejecutor->proyecto->estado == "Inicio")
                  Parcial
              @else
                  Final
              @endif
              {{-- {{$ejecutor->proyecto->estado}} --}}
            </span>
          </div>

          @if ($ejecutor->proyecto->estado == "Completado" )
            <div class="alert border-danger" role="alert">
              <h4 class="alert-heading"><i class="bi bi-exclamation-octagon me-1"></i> ¡Proyecto completado!</h4>
              <p>No se pueden subir más informes porque el proyecto ya ha finalizado.</p>
            </div>
          @elseif ($ejecutor->cargo->cargo == "Presidente(a)" )
            <!-- Custom Styled Validation -->
            <form action="{{route('informes.store')}}" method="POST" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
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
                <label for="validationCustom01" class="form-label">Informe</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-file-earmark-text-fill"></i></span>
                  <input type="text" class="form-control" name="nombre_informe" value="{{old('nombre_informe')}}" id="validationCustom01" required >
                  <div class="invalid-feedback">
                    Por favor ingrese el nombre del informe.
                  </div>
                </div>
              </div> <!--End Input Nombre-->

              <div class="col-md-12">
                <label for="validationCustom02" class="form-label">Comentario</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-file-text"></i></span>
                  <textarea name="descripcion" class="form-control" id="validationCustom02" required cols="30" rows="3">{{old('descripcion')}}</textarea>
                  <div class="invalid-feedback">
                    Por favor ingrese una breve descripción del infome.
                  </div>
                </div>
              </div> <!--End Input Descripcion-->

              <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Documento del informe <span class="badge border-light border-1 text-danger">* .pdf .docx .doc</span></label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-file-pdf"></i></span>
                  <input type="file" class="form-control" name="archivo" id="validationCustom01" required >
                  <div class="invalid-feedback">
                    Por favor carga el documento del reglamento.
                  </div>
                </div>
              </div> <!--End Input Nombre-->


              
              <div class="col-12 d-flex justify-content-center mt-4">
                <a href="{{route('informes.index')}}" class="btn btn-secondary m-2 " ><i class="bi bi-x me-1"></i> Cancelar</a>

                <button class="btn btn-primary m-2" type="submit"><i class="bi bi-person-check-fill me-1"></i> Guardar datos</button>
              </div>
              
            </form><!-- End Form -->
          @else
            <div class="alert border-danger" role="alert">
              <h4 class="alert-heading"><i class="bi bi-exclamation-octagon me-1"></i> ¡No tienes permiso!</h4>
              <p>Los informes solo serán subidos por el presidente del grupo.</p>
            </div>
          @endif



        </div>
      </div>

    </div>
  </div>
</section>






@endsection