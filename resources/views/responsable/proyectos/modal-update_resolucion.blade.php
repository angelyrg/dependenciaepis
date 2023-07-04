
{{-- Modal update Numero Resolucion --}}
<div class="modal fade" id="modal-update-resolucion-{{$proyecto->id}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Redactar: Informe Final</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{route('proyecto.set_resolution', $proyecto->id)}}" method="POST" class="row g-3 needs-validation" novalidate>
              @csrf  
              
              <div class="row mb-3">      
                <div class="col-md-12 mb-3">
                  <label for="numero_resolucion" class="form-label">Proyecto aprobado con resolución:</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-layout-text-window-reverse"></i></span>
                    <input type="text" class="form-control" name="numero_resolucion" value="{{old('numero_resolucion')}}" id="numero_resolucion" placeholder="0001-2023-CU-UNH" required>
                    <div class="invalid-feedback">
                      Por favor ingrese el número de resolución.
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 d-flex justify-content-center mt-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x me-1"></i> Cancelar</button>
                <button class="btn btn-primary m-2" type="submit"><i class="bi bi-file-word me-1"></i> Crear Resolución</button>
              </div> <!--End Botones-->
              
          </form>
      </div>
      <div class="modal-footer">
            
      </div>
    </div>
  </div>
</div>

