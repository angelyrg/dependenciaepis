
<div class="modal fade" id="modal-delete-{{$redaccion->id}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar redaccion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Está seguro si desea eliminar la redaccion <b>{{$redaccion->nombre_documento}}</b> ?</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{route('redaccion.destroy', $redaccion->id)}}">
          @csrf
          @method('delete')
          
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger"> Eliminar</button>
        </form>

      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->