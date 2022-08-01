
<div class="modal fade" id="modal-upload-informe" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark ">Subir  
          <b> Informe
            @if ($ejecutor->proyecto->estado == "Inicio")
                Parcial
            @else
                Final
            @endif
          </b>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
         <!-- Custom Styled Validation -->
         <form action="{{route('informes.store')}}" method="POST" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
          @csrf

          <hr class="dropdown-divider">

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

          <div class="col-md-12">
            <label for="validationCustom01" class="form-label">Documento del informe <span class="badge border-light border-1 text-danger">* .pdf .docx .doc</span></label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-file-pdf"></i></span>
              <input type="file" class="form-control" name="archivo" id="validationCustom01" required >
              <div class="invalid-feedback">
                Por favor carga el documento del informe.
              </div>
            </div>
          </div> <!--End Input Nombre-->


          
          <div class="col-12 d-flex justify-content-center mt-4">
            {{-- <a href="{{route('informes.index')}}" class="btn btn-secondary m-2 " ><i class="bi bi-x me-1"></i> Cancelar</a> --}}
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

            <button class="btn btn-primary mx-1" type="submit"><i class="bi bi-upload me-1"></i> Subir informe</button>
          </div>
          
        </form><!-- End Form -->
      </div>

    </div>
  </div>
</div><!-- End Basic Modal-->