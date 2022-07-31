
<div class="modal fade" id="modal-edit-{{$cargo->id}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar cargo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Custom Styled Validation -->
        <form action="{{route('cargos.update', $cargo->id)}}" method="POST" class="row g-3 needs-validation" novalidate>
          @csrf
          @method('PUT')

          <div class="col-md-12">
            <label for="validationCustom01" class="form-label">Cargo</label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-blockquote-left"></i></span>
              <input type="text" class="form-control" name="cargo" value="@if(!old('cargo')){{$cargo->cargo}}@else{{old('cargo')}}@endif" placeholder="Presidente(a)" id="validationCustom01" required >
              <div class="invalid-feedback">
                Por favor ingrese el cargo.
              </div>
            </div>
          </div> <!--End Input Nombre-->
          
          <div class="col-12 d-flex justify-content-center mt-4 align-items-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary m-2" type="submit">Guardar</button>
          </div>
          
        </form><!-- End Form -->

      </div>
    
    </div>
  </div>
</div><!-- End Basic Modal-->






