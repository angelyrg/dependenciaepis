{{-- Modal Informe de APROBACION --}}
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

                    <input type="hidden" name="tipo_informe" value="APROBACION" required>

                    <label for="proyecto_id" class="form-label">Seleccionar grupo</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-toggle-on"></i></span>
                      <select class="form-select" name="proyecto_id" id="proyecto_id" required>
                          <option selected disabled value="">Seleccione...</option>

                          @if($grupos_inscrito->isEmpty())
                            <option disabled value="">No hay grupos. </option>
                          @endif                              

                          @foreach ($grupos_inscrito as $grupo)
                            <option value={{$grupo->id}} >{{$grupo->nombre_grupo}}</option>
                          @endforeach
                      </select>
                      <div class="invalid-feedback">
                        Por favor seleccion un grupo.
                      </div>
                    </div>
                    <p class="text-success mt-2"><small>Se muestran grupos que están <b>"Inscritos"</b></small></p>
                  </div>
                </div>

                <div class="col-12 d-flex justify-content-center mt-4">
                  {{-- <a href="{{route('redaccion.index')}}" class="btn btn-secondary m-2 " ><i class="bi bi-x me-1"></i> Cancelar</a> --}}
                  <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal"><i class="bi bi-x me-1"></i> Cancelar</button>
                  <button class="btn btn-primary m-2" type="submit"><i class="bi bi-file-word me-1"></i> Generar documento</button>
                </div> <!--End Botones-->
                
            </form>
        </div>
        <div class="modal-footer">
              
        </div>
      </div>
    </div>
</div>

{{-- Modal Informe PARCIAL --}}
<div class="modal fade" id="modal-redaccion-parcial" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Redactar: Informe Parcial</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('redaccion.store')}}" method="POST" class="row g-3 needs-validation" novalidate>
                @csrf      
            
                <div class="row mb-3">
                  
                  <div class="col-md-12 ">

                    <input type="hidden" name="tipo_informe" value="PARCIAL" required>

                    <label for="proyecto_id" class="form-label">Seleccionar grupo</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-toggle-on"></i></span>
                      <select class="form-select" name="proyecto_id" id="proyecto_id" required>
                          <option selected disabled value="">Seleccione...</option>  

                          @if($grupos_inicio->isEmpty())
                            <option disabled value="">No hay grupos. </option>
                          @endif 
                          
                          @foreach ($grupos_inicio as $grupo)
                            <option value={{$grupo->id}} >{{$grupo->nombre_grupo}}</option>
                          @endforeach
                      </select>
                      <div class="invalid-feedback">
                        Por favor seleccion un grupo.
                      </div>
                    </div>
                    <p class="text-success mt-2"><small>Se muestran grupos que están en estado <b>"Inicio"</b></small></p>
                  </div>
                </div>
      
                <div class="col-12 d-flex justify-content-center mt-4">
                  {{-- <a href="{{route('redaccion.index')}}" class="btn btn-secondary m-2 " ><i class="bi bi-x me-1"></i> Cancelar</a> --}}
                  <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal"><i class="bi bi-x me-1"></i> Cancelar</button>
                  <button class="btn btn-primary m-2" type="submit"><i class="bi bi-file-word me-1"></i> Generar documento</button>
                </div> <!--End Botones-->
                
            </form>
        </div>
        <div class="modal-footer">
              
        </div>
      </div>
    </div>
</div>

{{-- Modal Informe FINAL --}}
<div class="modal fade" id="modal-redaccion-final" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Redactar: Informe Final</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{route('redaccion.store')}}" method="POST" class="row g-3 needs-validation" novalidate>
              @csrf      
          
              <div class="row mb-3">                
                <div class="col-md-12 ">
                  <input type="hidden" name="tipo_informe" value="FINAL" required>
                  <label for="proyecto_id" class="form-label">Seleccionar grupo</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-toggle-on"></i></span>
                    <select class="form-select" name="proyecto_id" id="proyecto_id" required>
                        <option selected disabled value="">Seleccione...</option>
                        @if($grupos_parcial->isEmpty())
                          <option disabled value="">No hay grupos en estado "Parcial" </option>
                        @endif
                        @foreach ($grupos_parcial as $grupo)
                          <option value={{$grupo->id}} >{{$grupo->nombre_grupo}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                      Por favor seleccion un grupo.
                    </div>
                  </div>
                  <p class="text-success mt-2"><small>Se muestran grupos que han aprobado su informe <b>"Parcial"</b></small></p>
                </div>
              </div>

              <div class="col-12 d-flex justify-content-center mt-4">
                <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal"><i class="bi bi-x me-1"></i> Cancelar</button>
                <button class="btn btn-primary m-2" type="submit"><i class="bi bi-file-word me-1"></i> Generar documento</button>
              </div>
              
          </form>
      </div>
      <div class="modal-footer">
            
      </div>
    </div>
  </div>
</div>

{{-- Modal Informe ESPECIAL --}}
<div class="modal fade" id="modal-redaccion-especial" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Redactar: Informe Caso especial</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{route('redaccion.store')}}" method="POST" class="row g-3 needs-validation" novalidate>
              @csrf      
          
              <div class="row mb-3">
                
                <div class="col-md-12 ">
                  <label for="asuntoSolicitud" class="form-label">Asunto de solicitud:</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="asuntoSolicitud"><i class="bi bi-toggle-on"></i></span>
                    <textarea name=asunto_solicitud"" id="asunto_solicitud" cols="30" rows="3" class="form-control" placeholder="Asunto de la solicitud" required>{{old('asunto_solicitud')}}</textarea>
                    <div class="invalid-feedback">
                      Por favor ingrese el asunto de la solicitud.
                    </div>
                  </div>
                </div>


                <div class="col-md-12 ">
                  <input type="hidden" name="tipo_informe" value="ESPECIAL" required>
                  <label for="fechaRecepcionSolicitud" class="form-label">Fecha de recepción de solicitud</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="fechaRecepcionSolicitud"><i class="bi bi-toggle-on"></i></span>
                    <input type="date" name="fecha_recepcion_solicitud" value="{{old('fecha_recepcion_solicitud')}}" class="form-control" required>
                    <div class="invalid-feedback">
                      Por favor seleccione una fecha.
                    </div>
                  </div>
                </div>

                
              </div>

              <div class="col-12 d-flex justify-content-center mt-4">
                <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal"><i class="bi bi-x me-1"></i> Cancelar</button>
                <button class="btn btn-primary m-2" type="submit"><i class="bi bi-file-word me-1"></i> Generar documento</button>
              </div>
              
          </form>
      </div>
      <div class="modal-footer">
            
      </div>
    </div>
  </div>
</div>

