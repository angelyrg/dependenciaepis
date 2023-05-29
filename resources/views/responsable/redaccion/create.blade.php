
@extends('layouts.niceadmin')

@section('content')

<div class="pagetitle">
  <h1>Redactar informe</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item">Informe</li>
      <li class="breadcrumb-item active">Redactar informe</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">

  <div class="row">
    <div class="col-lg-8 offset-lg-2">
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

  <div class="row">
    <div class="col-lg-8 offset-lg-2">

      <form action="{{route('redaccion.store')}}" method="POST" class="row g-3 needs-validation" novalidate>
        @csrf      

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Datos del proyecto</h5>
  
              <hr class="dropdown-divider">

              <div class="row mb-3">
                <div class="col-md-8 mb-3">
                  <label for="validationNumeroInforme" class="form-label">Número de informe</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id=""><i class="bi bi-layout-text-window-reverse"></i></span>
                    <input type="text" class="form-control" name="numero_informe" value="{{old('numero_informe')}}" id="validationNumeroInforme" required>
                    <div class="invalid-feedback">
                      Por favor ingrese el número del informe.
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-3">

                <div class="col-md-8 ">
                  <label for="validationCustom03" class="form-label">Nombre del Grupo</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-people-fill"></i></span>
                    <input type="text" name="nombre_grupo"  value="{{old('nombre_grupo')}}" required class="form-control" required aria-describedby="inputGroupPrepend" >  
                    <div class="invalid-feedback"> 
                      Por favor ingrese el nombre del grupo.
                    </div>
                  </div>
                </div> <!--End Input Nombre Grupo-->


                <div class="col-md-4">
                  <label for="validationCustom04" class="form-label">Modalidad de grupo</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-toggle-on"></i></span>
                    <select class="form-select" name="modalidad_grupo" id="validationCustom04" required>

                      <option selected disabled value="">Seleccione...</option> 

                      <?php $lineas = ["MONOVALENTE", "POLIVALENTE", "INTER FACULTATIVO"]; ?>

                      @foreach ($lineas as $linea)
                        
                        <option @if (old('modalidad_grupo') == $linea) {{'selected'}} @endif>{{$linea}}</option>                            

                      @endforeach

                      
                    </select>
                    <div class="invalid-feedback">
                      Por favor seleccion una modalidad.
                    </div>
                  </div>
                </div> <!--End Choose Modalidad-->


              </div>

              <div class="row mb-3">

                <div class="col-md-8 mb-3">
                  <label for="validationCustom01" class="form-label">Nombre del Proyecto</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-layout-text-window-reverse"></i></span>
                    <input type="text" class="form-control" name="nombre_proyecto" value="{{old('nombre_proyecto')}}" id="validationCustom01" required>
                    <div class="invalid-feedback">
                      Por favor ingrese el nombre del proyecto.
                    </div>
                  </div>
                </div> <!--End Input Nombre Proyecto-->

                <div class="col-md-4">
                  <label for="validationCustom04" class="form-label">Modalidad del proyecto</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-toggle-on"></i></span>
                    <select class="form-select" name="modalidad_proyecto" id="validationCustom04" required>
                      <option selected disabled value="">Seleccione...</option>  
                      @foreach ($modalidades as $modalidad)
                        @if ($modalidad->estado == "Activo")
                          @if (old('modalidad_proyecto') == $modalidad->id )
                            <option value="{{$modalidad->nombre}}" selected>{{$modalidad->nombre}}</option>
                          @else                            
                            <option value="{{$modalidad->nombre}}">{{$modalidad->nombre}}</option>
                          @endif
                        @endif
                      @endforeach
                    </select>
                    <div class="invalid-feedback">
                      Por favor seleccion una modalidad.
                    </div>
                  </div>
                </div> <!--End Choose Modalidad-->
              </div>


              <div class="col-12 d-flex justify-content-center mt-4">
                <a href="{{route('proyectos.index')}}" class="btn btn-secondary m-2 " ><i class="bi bi-x me-1"></i> Cancelar</a>
                <button class="btn btn-primary m-2" type="submit"><i class="bi bi-file-word me-1"></i> Generar documento</button>
              </div> <!--End Botones-->

          </div>
        </div> <!--End Card Datos del proyecto -->
      </form>


    </div>

  </div>


  
</section>

@endsection


