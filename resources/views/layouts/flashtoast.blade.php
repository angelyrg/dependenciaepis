

@if ($message = Session::get('success'))

<div class="position-fixed bottom-0 end-0 p-3 " style="z-index: 11">
    <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header d-flex justify-content-between">
            <div class="text-success">
                <i class="bi bi-check-circle-fill"></i>
                <strong class="me-auto"> ¡Correcto!</strong>
            </div>
            <div>
                <small> </small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
            </div>
        </div>
        <div class="toast-body">
            {{ $message }}
            <br><br>

            <div class="d-flex justify-content-end ">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="toast">Aceptar</button>
            </div>
            
        </div>
    </div>
</div>

@elseif($message = Session::get('danger'))

<div class="position-fixed bottom-0 end-0 p-3 " style="z-index: 11">
    <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header d-flex justify-content-between">
            <div class="text-danger">
                <i class="bi bi-x-circle-fill"></i>
                <strong class="me-auto"> ¡Ocurrió un error!</strong>
            </div>
            <div>
                <small> </small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
            </div>
        </div>
        <div class="toast-body">
            {{ $message }}
            <br><br>

            <div class="d-flex justify-content-end ">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="toast">Aceptar</button>
            </div>
            
        </div>
    </div>
</div>

@endif


