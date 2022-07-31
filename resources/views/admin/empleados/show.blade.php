<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        Editar Empleado
                    </div>
                    @if (session('info'))
                        <div class="alert alert-success">
                            <strong>{{ session('info') }}</strong>
                        </div>
                    @endif
                    <div class="card-body">
                        <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                            action="{{ route('admin.empleados.update', $empleado) }}">
                            @csrf
                            @method('put')

                            @include('admin.empleados.partials.eform')

                            <button style="background-color: rgb(59 130 246);" type="submit"
                                class="btn btn-primary m-2">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
