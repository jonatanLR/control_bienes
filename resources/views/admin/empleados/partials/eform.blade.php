<div class="form-group my-2">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre',$empleado->nombre) }}">
    @error('nombre')
        <small class=" text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group my-2">
    <label for="exampleInputEmail1">DNI</label>
    <input type="text" id="dni" name="dni" class="form-control" value="{{ old('dni',$empleado->dni) }}">
    @error('dni')
        <small class=" text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group my-2">
    
    <select name="depto" id="depto" class="form-control">
        @foreach ($deptos as $depto)
            <option value="{{ $depto->id }}" @if ($depto->id == $empleado->departamento->id) selected  @endif>{{ $depto->nombre }}</option>
        @endforeach
    </select> 

    @error('depto')
        <small class=" text-danger">{{ $message }}</small>
    @enderror
</div>