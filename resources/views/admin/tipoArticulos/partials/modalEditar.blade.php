<div class="modal fade" id="mEditartipoArt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Editar Tipo Articulos </h5>
                <button type="button" class="close m-0 p-1" data-bs-dismiss="modal" aria-label="Close"
                    aria-hidden="true">&times;</button>

            </div>
            <form id="formEditarTipoArt" action="{{ route('admin.tipo-articulos.update',4) }}" data-action="{{ route('admin.tipo-articulos.update',1) }}" method="POST">

                <div class="modal-body">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>                  

                    {{-- </form> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary bg-secondary"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary bg-info">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
