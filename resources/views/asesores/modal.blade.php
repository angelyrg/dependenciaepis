
<div class="modal fade" id="modal-delete-{{$asesor->id}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar asesor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Está seguro si desea eliminar el asesor <b>{{$asesor->nombres." ".$asesor->apellidos}}</b> ?</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{route('asesors.destroy', $asesor->id)}}">
          @csrf
          @method('delete')
          
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger"> Eliminar</button>
        </form>

      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->