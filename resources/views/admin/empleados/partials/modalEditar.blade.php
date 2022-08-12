<div class="modal fade" id="mEditarEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Editar Empleado </h5>
                <button type="button" class="close m-0 p-1" data-bs-dismiss="modal" aria-label="Close"
                    aria-hidden="true">&times;</button>

            </div>
            <form id="formEditarEmpleados" action="{{ route('admin.empleados.update',4) }}" data-action="{{ route('admin.empleados.update',1) }}" method="POST">

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
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">DNI:</label>
                        <input type="text" class="form-control" id="dni" name="dni">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Departamento:</label>
                        <br />
                        <select class="form-select" name="depto" id="depto">
                            {{-- comment: la variable deptos vienes desde el controlador-funcion index --}}
                            @foreach ($deptos as $depto)
                                <option value="{{ $depto->id }}">{{ $depto->nombre }}</option>
                            @endforeach
                        </select>
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


    {{-- <div class="modal fade" id="mEditarEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEmpleados">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">ID:</label>
                            <input type="text" class="form-control" id="mid" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="mnombre">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">DNI:</label>
                            <input type="text" class="form-control" id="mdni">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Departamento:</label>
                            <br />
                            <select name="mdepto" id="mdepto">
                                @foreach ($deptos as $depto)
                                    <option value="{{ $depto->id }}">{{ $depto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary nohover" id="btnUpdateEmpleados"
                        onClick="actualizarEmp()">Actualizar</button>
                </div>
            </div>
        </div>
    </div> --}}