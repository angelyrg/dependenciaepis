
<div class="modal fade" id="modal-redaccion-aprobacion" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Redactar: Aprobación e Inscripción del proyecto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('redaccion.store')}}" method="POST" class="row g-3 needs-validation" novalidate>
                @csrf      
            
                <div class="row mb-3">
                  
                  <div class="col-md-12 ">

                    <label for="proyecto_id" class="form-label">Seleccionar grupo</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-toggle-on"></i></span>
                      <select class="form-select" name="proyecto_id" id="proyecto_id" required>
                          <option selected disabled value="">Seleccione...</option>  
                          @foreach ($grupos as $grupo)
                            <option value={{$grupo->id}} >{{$grupo->nombre_grupo}}</option>
                          @endforeach
                      </select>
                      <div class="invalid-feedback">
                        Por favor seleccion un grupo.
                      </div>
                    </div>
                  </div>
                </div>

      
                <div class="row mb-3">      
                  <div class="col-md-12 mb-3">
                    <label for="numero_resolucion" class="form-label">Proyecto aprobado con resolución:</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-layout-text-window-reverse"></i></span>
                      <input type="text" class="form-control" name="numero_resolucion" value="{{old('numero_resolucion')}}" id="numero_resolucion" placeholder="0000-2023-CU-UNH" required>
                      <div class="invalid-feedback">
                        Por favor ingrese el número de resolución.
                      </div>
                    </div>
                  </div>
                </div>

                {{-- <div class="row mb-3">      
                  <div class="col-md-12 mb-3">
                    <label for="asesor1" class="form-label">Asesor 1:</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="asesor1"><i class="bi bi-person"></i></span>
                      <input type="text" class="form-control" name="asesor_1" value="{{old('asesor_1')}}" id="asesor1" placeholder="Dr. Santiago Antunez" required>
                      <div class="invalid-feedback">
                        Por favor ingrese el nombre del asesor.
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="asesor2" class="form-label">Asesor 2:</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                      <input type="text" class="form-control" name="asesor_2" value="{{old('asesor_2')}}" id="asesor2" placeholder="Dr. Ever Castillo Osorio" required>
                      <div class="invalid-feedback">
                        Por favor ingrese el nombre del asesor.
                      </div>
                    </div>
                  </div>
                </div> --}}
      
      
                <div class="col-12 d-flex justify-content-center mt-4">
                  <a href="{{route('redaccion.index')}}" class="btn btn-secondary m-2 " ><i class="bi bi-x me-1"></i> Cancelar</a>
                  <button class="btn btn-primary m-2" type="submit"><i class="bi bi-file-word me-1"></i> Generar documento</button>
                </div> <!--End Botones-->
                
            </form>
        </div>
        <div class="modal-footer">
              
        </div>
      </div>
    </div>
</div><!-- End Basic Modal-->

