<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <div class="card">
                    <div class="card-header">
                        Crear nuevo Empleado
                    </div>
                    <card-body>
                        <form action="">
                            <div>
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre">
                            </div>
                        </form>
                    </card-body>
                </div> --}}
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        Crear nuevo Empleado
                    </div>
                    <div class="card-body">
                        <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                            action="{{ route('admin.empleados.store') }}">
                            @csrf
                            
                            @include('admin.empleados.partials.form')

                            <button style="background-color: rgb(59 130 246);" type="submit"
                                class="btn btn-primary m-2">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
