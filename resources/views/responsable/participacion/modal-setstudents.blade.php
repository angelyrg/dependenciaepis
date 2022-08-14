<div class="modal fade" id="modal-set-students" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Estudiantes matriculados</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{route('setstudents')}}">
            @csrf

            <div class="modal-body">

                <div class="col-12 mt-3">
                    <label for="apellidos" class="form-label">Cantidad de estudiantes</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-123"></i></span>
                      <input type="number" name="ctd_estudiantes"  class="form-control" required min="0">
                      <div class="invalid-feedback">Ingrese un valor válido.</div>
                    </div>
                </div>

            </div>
            
            <div class="modal-footer">
                            
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary"> Guardar</button>

            </div>
        </form>  
      </div>
    </div>
  </div>