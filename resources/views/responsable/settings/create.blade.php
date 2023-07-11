

@extends('layouts.niceadmin')

@section('content')


<div class="pagetitle">
  <h1>Configuraciones generales</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Nueva configuración</li>

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
          <form action="{{route('settings.store')}}" method="POST" class="row needs-validation px-5" novalidate>
            @csrf

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
              <div class="col-6 border-end ">

                <div class="form-group mb-3">
                  <label for="validationCustom01" class="form-label">Año actual</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-bounding-box"></i></span>
                    <input type="text" maxlength="4" minlength="4" class="form-control" name="year_settings" value="{{old('year_settings')}}" id="validationCustom01" placeholder="{{ date('Y') }}" required>
                    <div class="invalid-feedback">
                      Por favor ingrese el año.
                    </div>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label for="validationCustom02" class="form-label">Nombre del director</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-lines-fill"></i></span>
                    <input type="text" class="form-control" name="nombre_director" value="{{old('nombre_director')}}" id="validationCustom02" placeholder="Dr. ..." required >
                    <div class="invalid-feedback">
                      Por favor ingrese el nombre del director.
                    </div>
                  </div>
                </div>

              </div>

              <div class="col-6">
                
                <div class="form-group mb-3">
                  <label class="form-label">Nombre del reglamento</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" ><i class="bi bi-person-lines-fill"></i></span>
                    <input type="text" class="form-control" name="reglamento_nombre" value="{{old('reglamento_nombre')}}" placeholder="Reglamento de Servicio Social, Extensión Cultural y Proyección Social" required >
                    <div class="invalid-feedback">
                      Por favor ingrese el nombre del reglamento.
                    </div>
                  </div>
                </div>
                
                <div class="form-group mb-3">
                  <label class="form-label">Reglamento aprobado con Resolución</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" ><i class="bi bi-person-lines-fill"></i></span>
                    <input type="text" class="form-control" name="reglamento_nro_resolucion" value="{{old('reglamento_nro_resolucion')}}" placeholder="0222-2022-CU-UNH" required >
                    <div class="invalid-feedback">
                      Por favor ingrese el número de resolución.
                    </div>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label class="form-label">Anexo que hace referencia al INFORME DE APROBACIÓN</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" ><i class="bi bi-person-bounding-box"></i></span>
                    <textarea class="form-control" name="anexo_informe_aprobacion" cols="30" rows="3" placeholder="ANEXO 05 (FICHA DE VALORACION DE PROYECTOS DE SERVICIO SOCIAL, EXTENSIÓN CULTURAL Y PROYECCIÓN SOCIAL)" required>
                      {{old('anexo_informe_aprobacion')}}
                    </textarea>
                    <div class="invalid-feedback">
                      Por favor ingrese el anexo.
                    </div>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label class="form-label">Anexo que hace referencia al INFORME PARCIAL</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" ><i class="bi bi-person-bounding-box"></i></span>
                    <textarea class="form-control" name="anexo_informe_parcial" cols="30" rows="3" placeholder="ANEXO 06 (FICHA DE VALORACION DE INFORMES DE SERVICIO SOCIAL UNIVERSITARIO, EXTENSIÓN CULTURAL Y PROYECCIÓN SOCIAL)" required>
                      {{old('anexo_informe_parcial')}}
                    </textarea>
                    <div class="invalid-feedback">
                      Por favor ingrese el anexo.
                    </div>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label class="form-label">Anexo que hace referencia al INFORME FINAL</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" ><i class="bi bi-person-bounding-box"></i></span>
                    <textarea class="form-control" name="anexo_informe_final" cols="30" rows="3" placeholder="ANEXO 06 (FICHA DE VALORACION DE INFORMES FINALES DE SERVICIO SOCIAL UNIVERSITARIO, EXTENSIÓN CULTURAL Y PROYECCIÓN SOCIAL)" required>
                      {{old('anexo_informe_final')}}
                    </textarea>
                    <div class="invalid-feedback">
                      Por favor ingrese el anexo.
                    </div>
                  </div>
                </div>
                
                <div class="form-group mb-3">
                  <label class="form-label">Anexo que que se mencionará en el INFORME ESPECIAL:</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" ><i class="bi bi-person-bounding-box"></i></span>
                    <textarea class="form-control" name="anexo_informe_especial" cols="30" rows="4" placeholder="CAPTITULO X (DISPOSICIONES FINALES), numeral tercero el cual a la letra dice: Los casos no previstos en el presente Reglamento, serán resueltos por la Dirección de Proyección Social y Extensión Cultural." required>
                      {{old('anexo_informe_especial')}}
                    </textarea>
                    <div class="invalid-feedback">
                      Por favor ingrese el anexo.
                    </div>
                  </div>
                </div>
                
              </div>
              
            </div>


            


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