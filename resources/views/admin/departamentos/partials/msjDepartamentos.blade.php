<!--msj de niño eliminado correctamente --->
@if (Session::has('msgdelete'))
    <div class="alert alert-danger" role="alert" id="msj">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <strong class="p-2"> {{ Session::get('msgdelete') }} </strong>

    </div>
@endif
