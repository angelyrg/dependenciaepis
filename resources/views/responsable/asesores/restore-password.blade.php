
<div class="modal fade" id="modal-restore-{{$asesor->id}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Restablecer contraseña</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Está seguro que desea restablecer la contraseña del asesor <b>{{$asesor->nombres." ".$asesor->apellidos}}</b> ?</p>
        <span class="small text-muted">* La contraseña será el número de DNI</span>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{route('restore', $asesor->user_id)}}">
          @csrf
          @method('put')
          
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger"> Restablecer contraseña</button>
        </form>

      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->