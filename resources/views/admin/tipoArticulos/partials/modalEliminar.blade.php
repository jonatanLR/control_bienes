<div class="modal fade" id="mEliminarTpArticulo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="titulomodal">Eliminar Tipo Articulo </h5>
                <button type="button" class="close m-0 p-1" data-bs-dismiss="modal" aria-label="Close"
                    aria-hidden="true">&times;</button>

            </div>
            <form id="formEliminarTpArticulo" action="{{ route('admin.tipo-articulos.destroy',4) }}" data-action="{{ route('admin.tipo-articulos.destroy',1) }}" method="POST">

                <div class="modal-body">
                    @csrf
                    @method('DELETE')

                    <div class="mb-3">
                        <label class="col-form-label">Nombre:</label>
                        <input type="text" id="nombre" readonly class="form-control">
                    </div>

                    {{-- </form> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary bg-secondary"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary bg-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
