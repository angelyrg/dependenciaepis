

@extends('layouts.niceadmin')

@section('content')


<div class="pagetitle">
  <h1>Configuraciones generales</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Editar configuración</li>

    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-10 offset-lg-1 ">

      <div class="card">
        <div class="card-body ">
          <h5 class="card-title">Configuración general</h5>
          <hr class="dropdown-divider">

          <!-- Custom Styled Validation -->
          <form action="{{route('settings.update', $setting->id)}}" method="POST" class="row needs-validation px-5" novalidate>
            @csrf
            @method('PUT')


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


            <div class="row">
              <div class="col-5">
                <div class="form-group mb-3">
                  <label for="validationCustom01" class="form-label">Año</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-bounding-box"></i></span>
                    <input type="text" maxlength="4" minlength="4" class="form-control" name="year_settings" value="@if(!old('year_settings')){{$setting->year}}@else{{old('year_settings')}}@endif" id="validationCustom01" required>
                    <div class="invalid-feedback">
                      Por favor ingrese el año.
                    </div>
                  </div>
                </div>
    
                <div class="form-group mb-3">
                  <label for="validationCustom02" class="form-label">Nombre del director</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-lines-fill"></i></span>
                    <input type="text" class="form-control" name="nombre_director" value="@if(!old('nombre_director')){{$setting->nombre_director}}@else{{old('nombre_director')}}@endif" id="validationCustom02" placeholder="Dr. ..." required >
                    <div class="invalid-feedback">
                      Por favor ingrese el nombre del director.
                    </div>
                  </div>
                </div>
                
                <div class="form-group mb-3">
                  <label for="validationCustom02" class="form-label">Nombre del responsable</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-lines-fill"></i></span>
                    <input type="hidden" name="responsable_id" value="{{$responsable->id}}">
                    <input type="text" class="form-control" name="nombre_responsable" value="@if(!old('nombre_responsable')){{$responsable->name}}@else{{old('nombre_responsable')}}@endif" id="validationCustom02" placeholder="Responsable" required >
                    <div class="invalid-feedback">
                      Por favor ingrese el nombre del responsable del área.
                    </div>
                  </div>
                </div>

              </div>

              <div class="col-7">

                <div class="form-group mb-3">
                  <label class="form-label">Nombre del reglamento</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" ><i class="bi bi-person-lines-fill"></i></span>
                    <input type="text" class="form-control" name="reglamento_nombre" value="@if(!old('reglamento_nombre')){{$setting->reglamento_nombre}}@else{{old('reglamento_nombre')}}@endif" placeholder="Reglamento de Servicio Social, Extensión Cultural y Proyección Social" required >
                    <div class="invalid-feedback">
                      Por favor ingrese el nombre del reglamento.
                    </div>
                  </div>
                </div>
                
                <div class="form-group mb-3">
                  <label class="form-label">Reglamento aprobado con Resolución</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" ><i class="bi bi-person-lines-fill"></i></span>
                    <input type="text" class="form-control" name="reglamento_nro_resolucion" value="@if(!old('reglamento_nro_resolucion')){{$setting->reglamento_nro_resolucion}}@else{{old('reglamento_nro_resolucion')}}@endif" placeholder="0222-2022-CU-UNH" required >
                    <div class="invalid-feedback">
                      Por favor ingrese el número de resolución.
                    </div>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label class="form-label">Anexo que hace referencia al INFORME DE APROBACIÓN</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" ><i class="bi bi-card-text"></i></span>
                    <textarea class="form-control" name="anexo_informe_aprobacion" cols="30" rows="3" placeholder="ANEXO 05 (FICHA DE VALORACION DE PROYECTOS DE SERVICIO SOCIAL, EXTENSIÓN CULTURAL Y PROYECCIÓN SOCIAL)" required>@if(!old('anexo_informe_aprobacion')){{$setting->anexo_informe_aprobacion}}@else{{old('anexo_informe_aprobacion')}}@endif</textarea>
                    <div class="invalid-feedback">
                      Por favor ingrese el anexo.
                    </div>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label class="form-label">Anexo que hace referencia al INFORME PARCIAL</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" ><i class="bi bi-card-text"></i></span>
                    <textarea class="form-control" name="anexo_informe_parcial" cols="30" rows="3" placeholder="ANEXO 06 (FICHA DE VALORACION DE INFORMES DE SERVICIO SOCIAL UNIVERSITARIO, EXTENSIÓN CULTURAL Y PROYECCIÓN SOCIAL)" required>@if(!old('anexo_informe_parcial')){{$setting->anexo_informe_parcial}}@else{{old('anexo_informe_parcial')}}@endif</textarea>
                    <div class="invalid-feedback">
                      Por favor ingrese el anexo.
                    </div>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label class="form-label">Anexo que hace referencia al INFORME FINAL</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" ><i class="bi bi-card-text"></i></span>
                    <textarea class="form-control" name="anexo_informe_final" cols="30" rows="3" placeholder="ANEXO 06 (FICHA DE VALORACION DE INFORMES FINALES DE SERVICIO SOCIAL UNIVERSITARIO, EXTENSIÓN CULTURAL Y PROYECCIÓN SOCIAL)" required>@if(!old('anexo_informe_final')){{$setting->anexo_informe_final}}@else{{old('anexo_informe_final')}}@endif</textarea>
                    <div class="invalid-feedback">
                      Por favor ingrese el anexo.
                    </div>
                  </div>
                </div>
                
                <div class="form-group mb-3">
                  <label class="form-label">Anexo que que se mencionará en el INFORME ESPECIAL:</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" ><i class="bi bi-card-text"></i></span>
                    <textarea class="form-control" name="anexo_informe_especial" cols="30" rows="4" placeholder="CAPTITULO X (DISPOSICIONES FINALES), numeral tercero el cual a la letra dice: Los casos no previstos en el presente Reglamento, serán resueltos por la Dirección de Proyección Social y Extensión Cultural." required>@if(!old('anexo_informe_especial')){{$setting->anexo_informe_especial}}@else{{old('anexo_informe_especial')}}@endif</textarea>
                    <div class="invalid-feedback">
                      Por favor ingrese el anexo.
                    </div>
                  </div>
                </div>
                
              </div>

            </div>
          


            <div class="col-12 d-flex justify-content-center mt-4">
              <a href="{{route('settings.index')}}" class="btn btn-secondary m-2 " ><i class="bi bi-x me-1"></i> Cancelar</a>
              <button class="btn btn-primary m-2" type="submit"><i class="bi bi-person-check-fill me-1"></i> Actualizar datos</button>
            </div>
            
          </form><!-- End Form -->

        </div>
      </div>

    </div>
  </div>
</section>






@endsection