<x-app-layout>
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Empleados') }}
        </h2>
        {{-- <a href="{{ route('admin.empleados.create') }}" class="btn-crear-empleados"><i class="fa-regular fa-square-plus"></i> Crear Empleado</a> --}}
        <a href="#" class="btn-crear" data-bs-toggle="modal" data-bs-target="#mCrearEmpleado"><i class="fa-regular fa-square-plus"></i> Crear Empleado</a>
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

    
    @include('admin.empleados.partials.modalEliminar')

    @include('admin.empleados.partials.modalCrear')

    @include('admin.empleados.partials.modalEditar')

    <x-slot name="scripts">
        <script src="{{ asset('js/funciones/Empleado.js') }}"></script>
    </x-slot>

</x-app-layout>

