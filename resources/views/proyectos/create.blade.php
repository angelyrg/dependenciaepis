

@extends('layouts.niceadmin')

@section('content')

<div class="pagetitle">
  <h1>Gestión de proyectos</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item">Proyectos</li>
      <li class="breadcrumb-item active">Registrar proyecto</li>

    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">

  <div class="row">
    <div class="col-12">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li> {{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
  </div> <!--End Mensajes de error-->

  <div class="row">
    <div class="col-lg-8 offset-lg-2">

      <form action="{{route('proyectos.store')}}" method="POST" class="row g-3 needs-validation" novalidate>
        @csrf      

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Datos del proyecto</h5>
  
              <hr class="dropdown-divider">


              <div class="row mb-3">

                <div class="col-md-5">
                  <label for="validationCustom03" class="form-label">Código</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-123"></i></span>
                    <input type="text" name="codigo"  value="{{old('codigo')}}" required class="form-control" required aria-describedby="inputGroupPrepend" >  
                    <div class="invalid-feedback">
                      Por favor ingrese el código del proyecto.
                    </div>
                  </div>
                </div> <!--End Input Codigo-->
    
                <div class="col-md-7">
                  <label for="validationCustom04" class="form-label">Modalidad</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-toggle-on"></i></span>
                    <select class="form-select" name="modalidad_id" id="validationCustom04" required>
                      <option selected disabled value="">Seleccione...</option>  
                      @foreach ($modalidades as $modalidad)
                        @if ($modalidad->estado == "Activo")
                          <option value="{{$modalidad->id}}">{{$modalidad->nombre}}</option>
                        @endif
                      @endforeach
                      
                    </select>
                    <div class="invalid-feedback">
                      Por favor seleccion un estado.
                    </div>
                  </div>
                </div> <!--End Choose Modalidad-->
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationCustom03" class="form-label">Nombre del grupo</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-people-fill"></i></span>
                  <input type="text" name="nombre_grupo"  value="{{old('nombre_grupo')}}" required class="form-control" required aria-describedby="inputGroupPrepend" >  
                  <div class="invalid-feedback"> 
                    Por favor ingrese el nombre del grupo.
                  </div>
                </div>
              </div> <!--End Input Nombre Grupo-->
  
              <div class="col-md-12 mb-3">
                <label for="validationCustom01" class="form-label">Nombre del Proyecto</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-layout-text-window-reverse"></i></span>
                  <input type="text" class="form-control" name="nombre_proyecto" value="{{old('nombre_proyecto')}}" id="validationCustom01" required>
                  <div class="invalid-feedback">
                    Por favor ingrese el nombre del proyecto.
                  </div>
                </div>
              </div> <!--End Input Nombre Proyecto-->
  
              <div class="col-md-12 mb-3">
                <label for="validationCustom02" class="form-label">Descripción</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-list-columns-reverse"></i></span>
                  <textarea name="descripcion" class="form-control" id="validationCustom02" required cols="30" rows="2">{{old('apellidos')}}</textarea>
                  <div class="invalid-feedback">
                    Por favor ingrese la descripción del proyecto.
                  </div>
                </div>
              </div> <!--End Input Descripcion-->

              <div class="row">
                <div class="col-md-6">
                  <label for="validationCustom04" class="form-label">Asesor</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-toggle-on"></i></span>
                    <select class="form-select" name="asesor_id" id="validationCustom04" required>
                      <option selected disabled value="">Seleccione Asesor...</option>   
                      
                      @foreach ($asesores_disponibles as $asesor_disponible)
                        {{$asesor_disponible}}
                        <option value="{{$asesor_disponible->id}}">{{$asesor_disponible->nombres." ".$asesor_disponible->apellidos}}</option>
                      @endforeach
                      
                    </select>
                    <div class="invalid-feedback">
                      Por favor seleccione un asesor.
                    </div>
                  </div>
                </div> <!--End Choose Asesor-->
  
                <div class="col-md-6">
                  <label for="CoAsesor" class="form-label">Co Asesor <span class="badge border-light border-1 text-warning">* Opcional</span> </label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="CoAsesor"><i class="bi bi-toggle-on"></i></span>
                    <select class="form-select" name="coasesor_id" id="CoAsesor" >
                      <option selected disabled value="">Seleccione Co Asesor...</option>   
                      
                      @foreach ($asesores_disponibles as $asesor_disponible)
                        {{$asesor_disponible}}
                        <option value="{{$asesor_disponible->id}}">{{$asesor_disponible->nombres." ".$asesor_disponible->apellidos}}</option>
                      @endforeach
                      
                    </select>
                    <div class="invalid-feedback">
                      Por favor seleccione un asesor.
                    </div>
                  </div>
                </div> <!--End Choose CoAsesor-->
              </div><!--End Asesores-->

              <div class="col-12 d-flex justify-content-center mt-4">
                <a href="{{route('proyectos.index')}}" class="btn btn-secondary m-2 " ><i class="bi bi-x me-1"></i> Cancelar</a>
                <button class="btn btn-primary m-2" type="submit"><i class="bi bi-person-check-fill me-1"></i> Guardar datos</button>
              </div> <!--End Botones-->

          </div>
        </div> <!--End Card Datos del proyecto -->
      </form>


    </div>

  </div>


  
</section>

@endsection

