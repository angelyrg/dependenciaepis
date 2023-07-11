
<div class="modal fade" id="modal-upload-document" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark ">Subir documento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
         <!-- Custom Styled Validation -->
         <form action="{{route('responsable.documentos.store')}}" method="POST" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
          @csrf

          <hr class="dropdown-divider">

          <div class="col-md-12">
            <label for="validationCustom01" class="form-label">Nombre del documento</label>
            <div class="input-group has-validation">
              
              <input type="text" class="form-control" name="nombre_documento" id="validationCustom01" required >
              <div class="invalid-feedback">
                Por favor escriba el nombre del documento.
              </div>
            </div>
          </div> <!--End Input Nombre-->


          <div class="col-md-12">
            <label for="" class="form-label">Documento</label>
            <div class="input-group has-validation">
              
              <input type="file" class="form-control" name="archivo" id="" accept=".pdf, .ppt, .pptx, .doc, .docx, .xls, .xlsx" required >
              <div class="invalid-feedback">
                Por favor carga el archivo.
              </div>
            </div>
          </div> <!--End Input Nombre-->


          <input type="hidden" name="proyecto_id" value="{{$proyecto->id}}" required>


          
          <div class="col-12 d-flex justify-content-center mt-4">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

            <button class="btn btn-primary mx-1" type="submit">Subir documento</button>
          </div>
          
        </form><!-- End Form -->
      </div>

    </div>
  </div>
</div><!-- End Basic Modal-->