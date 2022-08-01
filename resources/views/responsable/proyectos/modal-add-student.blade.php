
<div class="modal fade" id="modal-add-student" tabindex="-1">
  <div class="modal-dialog modal-sm_old">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Integrante N° {{count($proyecto->miembros)+1}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{route('ejecutores.store')}}" class="row g-3 needs-validation" novalidate>
        @csrf

        <div class="modal-body px-5">

          <label class="form-label "> <i class="bi bi-person-bounding-box"></i> Datos del ejecutor</label>

          <div class="col-12">
            <label for="nombres" class="form-label">Nombres</label>

            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
              <input type="text" name="nombres" class="form-control" id="nombres" required>
              <div class="invalid-feedback">Ingrese los nombres</div>
              </div>
          </div>

          <div class="col-12 mt-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-lines-fill"></i></span>
              <input type="text" name="apellidos" class="form-control" id="apellidos" required>
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
                <input type="text" name="codigo_matricula" id="codigo_matricula" minlength="10" maxlength="10" class="form-control" required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                <div class="invalid-feedback">Ingresa el código de matrícula.</div>
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
                    <option>V</option>
                    <option>VI</option>
                    <option>VII</option>
                    <option>VIII</option>
                    <option>IX</option>
                    <option>X</option>
                    <option>EGRESADO</option>
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
                      <option value="{{$cargo->id}}">{{$cargo->cargo}}</option>                        
                    @endforeach
                  </select>
                  <div class="invalid-feedback">Seleccione el cargo.</div>
                </div>
              </div>

            </div>
          @endif
            
          <input type="hidden" required class="form-control" value="{{$proyecto->id}}" name="proyecto_id" pattern="[0-9]"   >

          <div class="card-footer">
            <div class="col-12 mt-3  d-flex justify-content-center">
              <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Cancelar</button>
              <button class="btn btn-primary mx-1" type="submit">Guardar datos</button>
            </div>
          </div>


        </div>
      </form>
    </div>
  </div>
</div><!-- End Basic Modal-->