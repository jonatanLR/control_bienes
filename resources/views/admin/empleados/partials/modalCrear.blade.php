<div class="modal fade" id="mCrearEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title fs-5" id="exampleModalLabel">Crear Empleado</h5>

                <button type="button" class="close m-0 p-1" data-bs-dismiss="modal" aria-label="Close"
                    aria-hidden="true">&times;</button>

            </div>
            <form id="formCrearEmpleados" method="POST" action="{{ route('admin.empleados.store') }}">

                <div class="modal-body">
                    @csrf
                    @method('post')

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                        @error('nombre')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">DNI:</label>
                        <input type="text" class="form-control" id="dni" name="dni">
                        @error('dni')
                            <br>
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Departamento:</label>
                        <br />
                        <select class="form-select" name="depto" id="depto">
                            <option disabled selected>Seleccione departamento</option>
                            @foreach ($deptos as $depto)
                                <option value="{{ $depto->id }}">{{ $depto->nombre }}</option>
                            @endforeach
                        </select>
                        @error('depto')
                            <br>
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>
                    {{-- </form> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary bg-secondary"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary bg-primary" id="btnCrearEmpleados">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
