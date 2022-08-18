<div class="modal fade" id="mCrearTipoArticulo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title fs-5" id="exampleModalLabel">Crear Tipo Articulo</h5>

                <button type="button" class="close m-0 p-1" data-bs-dismiss="modal" aria-label="Close"
                    aria-hidden="true">&times;</button>

            </div>
            <form id="formCrearTpArticulo" method="POST" action="{{ route('admin.tipo-articulos.store') }}">

                <div class="modal-body">
                    @csrf
                    @method('post')

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                       
                    </div>
                    
                    {{-- </form> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary bg-secondary"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary bg-primary" id="btnCrearTpArticulo">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
