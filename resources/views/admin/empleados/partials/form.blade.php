<div class="form-group my-2">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" id="nombre" name="nombre" class="form-control" >
    @error('nombre')
        <small class=" text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group my-2">
    <label for="exampleInputEmail1">DNI</label>
    <input type="text" id="dni" name="dni" class="form-control" >
    @error('dni')
        <small class=" text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group my-2">
    
    <select name="depto" id="depto" class="form-control">
        <option selected disabled>Seleccione Departamento</option>
        @foreach ($deptos as $depto)
            <option value="{{ $depto->id }}">{{ $depto->nombre }}</option>
        @endforeach
    </select>

    @error('depto')
        <small class=" text-danger">{{ $message }}</small>
    @enderror
</div>