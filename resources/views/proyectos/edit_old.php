

@extends('layouts.niceadmin')

@section('content')

<div class="pagetitle">
  <h1>Gestión de proyectos</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item">Proyectos</li>
      <li class="breadcrumb-item active">Editar proyecto</li>

    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Editar proyecto</h5>

          <!-- Custom Styled Validation -->
          <form action="{{route('proyectos.update', $proyecto->id)}}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf
            @method('PUT')

            <hr class="dropdown-divider">

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="col-md-5 inline">
              <label for="validationCustom03" class="form-label">Código</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-123"></i></span>
                <input type="text" name="codigo"  value="@if(!old('codigo')){{$proyecto->codigo}}@else{{old('codigo')}}@endif" required class="form-control" required aria-describedby="inputGroupPrepend" >  
                <div class="invalid-feedback">
                  Por favor ingrese el código del proyecto.
                </div>
              </div>
            </div> <!--End Input COdigo-->

            <div class="col-md-7 inline">
              <label for="validationCustom03" class="form-label">Nombre del grupo</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-easel3-fill"></i></span>
                <input type="text" name="nombre_grupo"  value="@if(!old('nombre_grupo')){{$proyecto->nombre_grupo}}@else{{old('nombre_grupo')}}@endif" required class="form-control" required aria-describedby="inputGroupPrepend" >  
                <div class="invalid-feedback"> 
                  Por favor ingrese el nombre del grupo.
                </div>
              </div>
            </div> <!--End Input Grupo-->

            <div class="col-md-12">
              <label for="validationCustom01" class="form-label">Nombre del Proyecto</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-layout-text-window-reverse"></i></span>
                <input type="text" class="form-control" name="nombre_proyecto" value="@if(!old('nombre_proyecto')){{$proyecto->nombre_proyecto}}@else{{old('nombre_proyecto')}}@endif" id="validationCustom01" required>
                <div class="invalid-feedback">
                  Por favor ingrese el nombre del proyecto.
                </div>
              </div>
            </div> <!--End Input Nombre-->

            <div class="col-md-12">
              <label for="validationCustom02" class="form-label">Descripción</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-list-columns-reverse"></i></span>
                <textarea name="descripcion" class="form-control" id="validationCustom02"  cols="30" rows="3">@if(!old('descripcion')){{$proyecto->descripcion}}@else{{old('descripcion')}}@endif</textarea>
                <div class="invalid-feedback">
                  Por favor ingrese la descripción del proyecto.
                </div>
              </div>
            </div> <!--End Input Apellido-->

            <div class="col-md-7 inline">
              <label for="validationCustom04" class="form-label">Modalidad</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-toggle-on"></i></span>
                <select class="form-select" name="modalidad_id" id="validationCustom04" required>
                  <option  disabled value="">Seleccione...</option>  
                  @foreach ($modalidades as $modalidad)
                    @if ($modalidad->estado == "Activo")

                      @if ( old('modalidad_id') == $modalidad->id  || $proyecto->modalidad_id == $modalidad->id )
                        <option value="{{$modalidad->id}}" selected>{{$modalidad->nombre}}</option>
                      @else
                        <option value="{{$modalidad->id}}">{{$modalidad->nombre}}</option>
                      @endif
                      
                    @endif
                  @endforeach
                  
                </select>
                <div class="invalid-feedback">
                  Por favor seleccion un estado.
                </div>
              </div>
            </div> <!--End Choose Modalidad-->

            <div class="col-md-5">
              <label for="validationCustom04" class="form-label">Estado</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-toggle-on"></i></span>
                <select class="form-select" name="estado" id="validationCustom04" required>
                  <option selected disabled value="">Seleccione...</option>                  
                  @if (old('estado') == "Activo" || $proyecto->estado == "Activo")
                    <option selected>Activo</option>
                    <option>Inactivo</option>
                  @elseif (old('estado') == "Inactivo" || $proyecto->estado == "Inactivo")
                    <option>Activo</option>
                    <option selected>Inactivo</option>
                  @else
                    <option>Activo</option>
                    <option>Inactivo</option>
                  @endif
                </select>
                <div class="invalid-feedback">
                  Por favor seleccion una modalidad.
                </div>
              </div>
            </div> <!--End Choose Estado-->
            
            <div class="col-12 d-flex justify-content-center mt-4">
              <a href="{{route('proyectos.index')}}" class="btn btn-secondary m-2 " ><i class="bi bi-x me-1"></i> Cancelar</a>

              <button class="btn btn-primary m-2" type="submit"><i class="bi bi-person-check-fill me-1"></i> Guardar datos</button>
            </div>
            
          </form><!-- End Form -->

        </div>
      </div>

    </div>
  </div>
</section>






@endsection