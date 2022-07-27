
<div class="modal fade" id="modal-delete-informe" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark fw-bold">Eliminar informe</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-dark">¿Está seguro que desea eliminar el informe <b>{{$informe->nombre_informe}}</b> ?</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{route('informes.destroy', $informe->id)}}">
          @csrf
          @method('delete')
          
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger"> Eliminar</button>
        </form>

      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->