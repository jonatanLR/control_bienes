<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Departamentos') }}
        </h2>
        {{-- <a href="{{ route('admin.empleados.create') }}" class="btn-crear-empleados"><i class="fa-regular fa-square-plus"></i> Crear Empleado</a> --}}
        <a href="#" class="btn-crear" data-bs-toggle="modal" data-bs-target="#mCrearDepto"><i class="fa-regular fa-square-plus"></i> Crear Departamento</a>
    </x-slot>

    <div class="py-8">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('admin.departamentos.partials.msjDepartamentos')
            <div class="bg-white shadow-xl sm:rounded-lg p-2">
                {{-- <div class="card">
                    <div class="card-body"> --}}
                <table class="table table-striped" id="deptos">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
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

    @include('admin.departamentos.partials.modalCrear')
    @include('admin.departamentos.partials.modalEliminar')

    @include('admin.departamentos.partials.modalEditar')

    <x-slot name="scripts">
        <script src="{{ asset('js/funciones/Departamento.js') }}"></script>
    </x-slot>

</x-app-layout>

