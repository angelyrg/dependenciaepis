

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


@section('js')


<div class="col-lg-5">

  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-title">Integrantes del grupo</h5>
        <button id="addRow" type="button" class="btn btn-sm btn-primary"><i class=" bi bi-person-plus-fill"></i> Agregar</button>
      </div>

      <div class="border border-2 rounded p-1 mb-3  bg-light" id="inputFormRow">
        <div class="d-flex justify-content-between align-items-end ">
          <label for="validationCustom01" class="form-label "> <i class="bi bi-person-bounding-box"></i> Datos del estudiante</label>
          <button id="removeRow" type="button" class="btn btn-sm btn-danger"><i class="bi bi-person-dash-fill"></i> Remover</button>
        </div>
        <hr class="dropdown-divider">
        <div class="row mb-2">
          <div class="col-md-6">
            <div class="input-group has-validation">
              <input type="text" class="form-control" name="nombres[]" value="{{old('nombres')}}" id="validationCustom01"  placeholder="Nombres" required>
              <div class="invalid-feedback">
                Por favor ingrese el nombre.
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group has-validation">
              <input type="text" class="form-control" name="apellidos[]" value="{{old('apellidos')}}" id="validationCustom02" placeholder="Apellidos" required >
              <div class="invalid-feedback">
                Por favor ingrese el apellido.
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-md-6">
            <div class="input-group has-validation">
              <input type="text" name="codigo_matricula[]" minlength="10" maxlength="10" value="{{old('codigo_matricula')}}" placeholder="Código de matrícula" required class="form-control" required aria-describedby="inputGroupPrepend" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">  
              <div class="invalid-feedback">
                Por favor ingrese un Código de matrícula válido.
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group has-validation">
              <input type="email" class="form-control" name="email[]" placeholder="correo@unh.edu.pe" value="{{old('email')}}" id="validationCustom02" pattern="[a-zA-Z0-9._%+-]+@+unh.edu.pe"  required >
              <div class="invalid-feedback">
                Por favor ingrese un correo electrónico institucional de la UNH.
              </div>
            </div>
          </div>
        </div>
      </div>


      <div id="newRow"></div>


    </div>
  </div> <!--End Card Integrante -->

</div>
  
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
  //Agregar formulario
  $("#addRow").click(function () {
    var formEstudiante = `
      <div class="border border-2 rounded p-1 mb-3  bg-light" id="inputFormRow">
              <div class="d-flex justify-content-between align-items-end ">
                <label for="validationCustom01" class="form-label "> <i class="bi bi-person-bounding-box"></i> Datos del estudiante</label>
                <button id="removeRow" type="button" class="btn btn-sm btn-danger"><i class="bi bi-person-dash-fill"></i> Remover</button>
              </div>
              <hr class="dropdown-divider">
              <div class="row mb-2">
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" name="nombres[]" value="{{old('nombres')}}" id="validationCustom01"  placeholder="Nombres" required>
                    <div class="invalid-feedback">
                      Por favor ingrese el nombre.
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" name="apellidos[]" value="{{old('apellidos')}}" id="validationCustom02" placeholder="Apellidos" required >
                    <div class="invalid-feedback">
                      Por favor ingrese el apellido.
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <input type="text" name="codigo_matricula[]" minlength="10" maxlength="10" value="{{old('codigo_matricula')}}" placeholder="Código de matrícula" required class="form-control" required aria-describedby="inputGroupPrepend" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">  
                    <div class="invalid-feedback">
                      Por favor ingrese un Código de matrícula válido.
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <input type="email" class="form-control" name="email[]" placeholder="correo@unh.edu.pe" value="{{old('email')}}" id="validationCustom02" pattern="[a-zA-Z0-9._%+-]+@+unh.edu.pe"  required >
                    <div class="invalid-feedback">
                      Por favor ingrese un correo electrónico institucional de la UNH.
                    </div>
                  </div>
                </div>
              </div>
            </div>
    `;

    $('#newRow').append(formEstudiante);
  });
  
  // borrar formulario
  $(document).on('click', '#removeRow', function () {
    $(this).closest('#inputFormRow').remove();
  });

</script>

@endsection