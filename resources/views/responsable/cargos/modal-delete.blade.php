
<div class="modal fade" id="modal-delete-{{$cargo->id}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar cargo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Está seguro si desea eliminar la cargo <b>{{$cargo->cargo}}</b> ?</p>
        <p>
          <small class="fst-italic text-secondary fw-light">Recomendación: No borrar este cargo</small>
        </p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{route('cargos.destroy', $cargo->id)}}">
          @csrf
          @method('delete')
          
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger"> Eliminar</button>
        </form>

      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->