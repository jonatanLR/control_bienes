<x-app-layout>
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Empleados') }}
        </h2>
        <a href="{{ route('admin.empleados.create') }}" class="btn-crear-empleados"><i class="fa-regular fa-square-plus"></i> Crear Empleado</a>
        {{-- <a href="#" class="btn-crear-empleados" data-bs-toggle="modal" data-bs-target="#mCrearEmpleado"><i class="fa-regular fa-square-plus"></i> Crear Empleado</a> --}}
    </x-slot>

    <div class="py-8">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('admin.empleados.partials.msjEmpleados')
            <div class="bg-white shadow-xl sm:rounded-lg p-2">
                {{-- <div class="card">
                    <div class="card-body"> --}}
                <table class="table table-striped" id="empleados">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Departamento</th>
                            <th></th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                                @foreach ($empleados as $empleado)
                                    <tr>
                                        <td>{{ $empleado->id }}</td>
                                        <td>{{ $empleado->nombre }}</td>
                                        <td>{{ $empleado->dni }}</td>
                                        <td>{{ $empleado->depto }}</td>
                                        <td><a class="btn btn-primary btn-sm" href="{{ route('admin.empleados.edit',$empleado) }}">Editar</a></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody> --}}
                </table>
                {{-- </div>
                </div> --}}
            </div>
        </div>
    </div>

    {{-- modal para crear empleado --}}
    {{-- <div class="modal" id="mCrearEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formCrearEmpleados" method="POST" action="{{ route('admin.empleados.store') }}">

                    <div class="modal-body">
                        @csrf

                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="m_nombre">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">DNI:</label>
                            <input type="text" class="form-control" id="m_dni">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Departamento:</label>
                            <br />
                            <select name="m_depto" id="m_depto">
                                <option selected>Seleccione departamento</option>
                                @foreach ($deptos as $depto)
                                    <option value="{{ $depto->id }}">{{ $depto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary nohover" id="btnCrearEmpleados">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    
    @include('admin.empleados.partials.modalEliminar')

    @include('admin.empleados.partials.modalCrear')

    @include('admin.empleados.partials.modalEditar')

</x-app-layout>

