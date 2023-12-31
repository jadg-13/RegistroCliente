@extends('templates.template')

@section('title', 'Registro')


@section('content')
    <br>
    <br>

    <form action="{{ route('customer.save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"  value="{{ old('nombre', $request->nombre ?? '') }}">
        <br>
        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos', $apellidos ?? '') }}">
        <br>
        <label for="identificador">Identificador:</label><br>
        <input type="text" id="identificador" name="identificador" value="{{ old('identificador', $identificador ?? '') }}">
        @if ($errors->has('Advertencia'))
            <br>
            "{{ $errors->first('Advertencia') }}"
        @endif
        <br>
        <label for="telefono">Teléfono:</label><br>
        <input type="tel" id="telefono" name="telefono" value="{{ old('telefono', $telefono ?? '') }}" required>
        <br>
        <label for="imagen">Imagen:</label><br>
        <input type="file" id="imagen" name="imagen" >
        <br>
        <br>
        <button type="submit" class="btn btn-outline-success col-12 col-md-2">Enviar</button>
    </form>
@endsection
