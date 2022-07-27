

@extends('layouts.niceadmin')

@section('content')

<div class="pagetitle">
  <div class="row d-flex justify-content-between">
    <div class="col">

      <h1>Gestión de proyectos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item">Proyectos</li>
          <li class="breadcrumb-item active">Detalles del proyecto</li>
    
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
            <div class="row ">
              <div class="col-2 ">
                <i class="bi bi-chat-right-quote-fill"></i>
              </div>
              <div class="col-10 ">
                <h3 class="p-0 m-0">{{$proyecto->nombre_grupo}}</h3>
              </div>

            </div>

            <p class="card-title mt-3">Proyecto</p>
            <p>{{$proyecto->nombre_proyecto}}</p>

            <p class="card-title mt-3">Descripción</p>
            <p>{{$proyecto->descripcion}}</p>

            <p class="card-title mt-3">Modalidad</p>
            <p>{{$proyecto->modalidad->nombre}}</p>

            <p class="card-title mt-3">Asesores</p>
            
            <ul>
              @foreach ($proyecto->asesores as $asesor)
                <li><p>{{$asesor->nombres." ".$asesor->apellidos}}</p></li>
              @endforeach
             
            </ul>
            

          </div>
          
        </div>
      </div>
    </div>

    <div class="col-lg-8">

      <div class="col-lg-12">

        

        <div class="row">
          <div class="card">
            <div class="card-body">

              <h5 class="card-title">Ejecutores del proyecto</h5>
             

              <div class="table-responsive">

                <!-- Table with stripped rows -->
                <table class="table table-sm ">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombres</th>
                      <th scope="col">Apellidos</th>
                      <th scope="col">Código de Matrícula</th>
                      <th scope="col">Ciclo</th>
                      <th scope="col">Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
  
                    <?php $c = 0; ?>
                    @foreach ($ejecutores as $ejecutor)
                      <?php $c++; ?>
  
                      <tr>
                        <th scope="row">{{$c}}</th>
                        <td>{{$ejecutor->nombres}}</td>
                        <td>{{$ejecutor->apellidos}}</td>
                        <td>{{$ejecutor->codigo_matricula}}</td>
                        <td>{{$ejecutor->ciclo}}</td>
                        <td>
                          <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$ejecutor->id}}">
                            <i class="bi bi-trash"></i>
                          </button>
                        </td>
                        @include('responsable.proyectos.modal-delete-student')
                      </tr>
                          
                    @endforeach
  
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
              </div>

            </div>

          </div> <!--End Card Integrante -->

        </div>

        <div class="row">
          @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <ul>
                @foreach ($errors->all() as $error)
                  <li> {{ $error }}</li>
                @endforeach
              </ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php //dd($errors) ?>
          @endif
        </div>


        <div class="row">
          <div class="card">
            <div class="card-body">
  
              <form action="{{route('ejecutores.store')}}" method="POST" class="needs-validation">
                @csrf

                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="card-title">Agregar integrantes</h5>
                  <button id="addRow" type="button" class="btn btn-sm btn-primary"><i class=" bi bi-person-plus-fill"></i> Agregar</button>
                </div>

                <div id="newRow"></div>
    
                <div class="col-md-12 text-center" id="btnSUbmit">
                  <button type="submit" id="submitButton" class="btn btn-primary" hidden >Guardar todo</button>
                </div>
              </form>

            </div>

          </div> <!--End Card Integrante -->

        </div>

      
      </div>

    </div>

  </div>
  
</section>

@endsection


@section('js')
  
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">

  function toggleButton(){
      if (ctdForms > 0) {
        $('#submitButton').attr('hidden', false);
      } else {
        $('#submitButton').attr('hidden', true);
      }
  }

  var ctdForms = 0;

  //Agregar formulario
  $("#addRow").click(function () {

    var formEstudiante = `
      <div class="border border-2 rounded p-1 mb-3  bg-light" id="inputFormRow">
        <div class="d-flex justify-content-between align-items-end ">
          <label class="form-label "> <i class="bi bi-person-bounding-box"></i> Datos del ejecutor</label>
          <button id="removeRow" type="button" class="btn btn-sm btn-danger"><i class="bi bi-x-lg"></i> </button>
        </div>
        <hr class="dropdown-divider">
        <div class="row mb-2">
          <div class="col-md-6">
            <div class="input-group has-validation">
              <input type="text"  class="form-control" name="nombres[]" placeholder="Nombres" required>
              <div class="invalid-feedback">
                Por favor ingrese el nombre.
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group has-validation">
              <input type="text"  class="form-control" name="apellidos[]" placeholder="Apellidos"  required>
              <div class="invalid-feedback">
                Por favor ingrese el apellido.
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-md-6">
            <div class="input-group has-validation">
              <input type="text"  name="codigo_matricula[]" required minlength="10" maxlength="10"  title="POr favor ingrese un código de matrícula válido." placeholder="Código de matrícula"  class="form-control"  aria-describedby="inputGroupPrepend" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">  
              <div class="invalid-feedback">
                Por favor ingrese un Código de matrícula válido.
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group has-validation">
              <input type="hidden" required class="form-control" value="{{$proyecto->id}}" name="proyecto_id[]" pattern="[0-9]"   >

              <input type="input"  class="form-control" name="ciclo[]"  placeholder="Ciclo"  >
              <div class="invalid-feedback">
                Por favor ingrese el ciclo del ejecutor.
              </div>
            </div>
          </div>
        </div>
      </div>
    `;

    $('#newRow').append(formEstudiante);
    ctdForms++;
    toggleButton()
  });
  
  // borrar formulario
  $(document).on('click', '#removeRow', function () {
    $(this).closest('#inputFormRow').remove();
    ctdForms--;
    toggleButton()
  });

</script>

@endsection