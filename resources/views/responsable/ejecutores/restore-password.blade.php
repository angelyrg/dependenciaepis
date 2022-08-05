
<div class="modal fade" id="modal-restore-{{$ejecutor->id}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Restablecer contraseña</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Está seguro que desea restablecer la contraseña del ejecutor <b>{{$ejecutor->nombres." ".$ejecutor->apellidos}}</b> ?</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{route('restore', $ejecutor->user_id)}}">
          @csrf
          @method('put')
          
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x"></i> Cancelar</button>
          <button type="submit" class="btn btn-success">
            <i class="bi bi-arrow-clockwise"></i> Restablecer contraseña</button>
        </form>

      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->