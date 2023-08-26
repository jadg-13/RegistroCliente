@extends('templates.template')
@section('title', 'Cliente')
@section('content')
<form action="{{ route('customer.update', $dato->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nombre">Nombre:</label><br>
    <input type="text" name="nombre" value="{{ $dato->first_name }}" required>
    <br>
    <label for="apellidos">Apellidos:</label><br>
    <input type="text" name="apellidos" value="{{ $dato->second_name }}" required>
    <br>
    <label for="identificador">Identificador:</label><br>
    <input type="text" name="identificador" value="{{ $dato->id_customer }}" required>
    <br>
    <label for="telefono">Teléfono:</label><br>
    <input type="text" name="telefono" value="{{ $dato->phone }}" required>
    <br>
    <label for="imagen">Imagen:</label><br>
  <input type="file" id="imagen" name="imagen">
  <br>
    <button type="submit">Guardar cambios</button>
</form>
@endsection
