@extends('layouts.niceadmin')

@section('content')

  <div class="row" >
    <div class="col-md-6 offset-md-3">


      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title">Integrante N° {{count($proyecto->miembros)+1}}</h5>
        </div>

        <form method="POST" action="{{route('ejecutores.store')}}" class="row g-3 needs-validation" novalidate>
          @csrf

          <div class="modal-body px-5">

            <label class="form-label "> <i class="bi bi-person-bounding-box"></i> Datos del ejecutor</label>

            <div class="col-12">
              <label for="nombres" class="form-label">Nombres</label>

              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                <input type="text" name="nombres" value="{{old('nombres')}}" class="form-control" id="nombres" required>
                <div class="invalid-feedback">Ingrese los nombres</div>
                </div>
            </div>

            <div class="col-12 mt-3">
              <label for="apellidos" class="form-label">Apellidos</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-lines-fill"></i></span>
                <input type="text" name="apellidos" value="{{old('apellidos')}}" class="form-control" id="apellidos" required>
                <div class="invalid-feedback">Ingrese los apellidos.</div>
                </div>
            </div>

            @if (strtolower($proyecto->modalidad->nombre) == "proyección social")     
              <div class="col-12 mt-3">
                <label for="codigo_matricula" class="form-label">DNI</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-video"></i></span>
                  <input type="text" name="codigo_matricula" id="codigo_matricula" minlength="8" maxlength="8" class="form-control" required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                  <div class="invalid-feedback">Ingresa el DNI.</div>
                </div>
              </div>

              <div class="col-12 mt-3">
                <label for="cargo_id" class="form-label">Cargo</label>
    
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-badge"></i></span>
                  <select name="cargo_id" id="cargo_id" class="form-select" required>
                    @foreach ($cargos as $cargo)
                      <option value="{{$cargo->id}}">{{$cargo->cargo}}</option>                        
                    @endforeach
                  </select>
                  <div class="invalid-feedback">Seleccione el cargo.</div>
                </div>
              </div>

            @else
              <div class="col-12 mt-3">
                <label for="codigo_matricula" class="form-label">Código de matrícula</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-video"></i></span>
                  <input type="text" name="codigo_matricula"  value="{{old('codigo_matricula')}}" id="codigo_matricula" minlength="10" maxlength="10" class="form-control{{ $errors->has('codigo_matricula') ? ' is-invalid' : '' }}" required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                  <div class="invalid-feedback">Ingresa un código de matrícula válido.</div>
                  @if ($errors->has('codigo_matricula'))                      
                      <div class="invalid-feedback">{{ $errors->first('codigo_matricula') }}</div>
                  @endif

                </div>
              </div>
            @endif

            @if (strtolower($proyecto->modalidad->nombre) != "proyección social")
            <div class="row">
              
                <div class="col-6 mt-3">
                  <label for="codigo_matricula" class="form-label">Ciclo</label>
                  
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-video3"></i></span>
                    <select name="ciclo" id="ciclo" class="form-select" required>
                      <option selected disabled value="">Seleccione...</option>

                      <?php $ciclos = ["V", "VI", "VII", "VIII", "IX", "X", "EGRESADO",]; ?>
                      @foreach ($ciclos as $ciclo)
                        <option @if (old('ciclo') == $ciclo) {{'selected'}} @endif>{{$ciclo}}</option>                            
                      @endforeach

                    </select>
                    <div class="invalid-feedback">Seleccione el ciclo</div>
                  </div>
                </div>

                <div class="col-6 mt-3">
                  <label for="cargo_id" class="form-label">Cargo</label>
      
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-badge"></i></span>
                    <select name="cargo_id" id="cargo_id" class="form-select" required>
                      @foreach ($cargos->reverse() as $cargo)
                        <option @if (old('cargo_id') == $cargo->id) {{'selected'}} @endif value="{{$cargo->id}}">{{$cargo->cargo}}</option>    
                      @endforeach
                    </select>
                    <div class="invalid-feedback">Seleccione el cargo.</div>
                  </div>
                </div>

              </div>
            @endif
              
            <input type="hidden" required class="form-control" value="{{$proyecto->id}}" name="proyecto_id" pattern="[0-9]"   >

            <div class="card-footer">
              <div class="col-12 mt-3  d-flex justify-content-center align-items-center">
                <a href="{{route('proyectos.show', $proyecto->id)}}" class="btn btn-secondary m-2 " ><i class="bi bi-x me-1"></i> Cancelar</a>
                <button class="btn btn-primary mx-1" type="submit">Guardar datos</button>
              </div>
            </div>

          </div>
        </form>


      </div>
    </div>
  </div><!-- End Add Student-->

@endsection

