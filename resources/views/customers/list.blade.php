@extends('templates.template')
@section('title', 'Cliente')
@section('content')
<h1>Lista de clientes</h1>
<a href="{{ route('customer.export') }}" class="btn btn-outline-info col-12 col-md-2">Exportar</a>
<a href="{{route('customer.index')}}" class="btn btn-outline-success col-12 col-md-2">Registrar</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>ID de cliente</th>
            <th>Teléfono</th>
            <th>Imagen</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->first_name }}</td>
            <td>{{ $customer->second_name }}</td>
            <td>{{ $customer->id_customer }}</td>
            <td>{{ $customer->phone }}</td>
            <td>
                @if($customer->image)
                    <img src="{{ asset('images/' . $customer->image) }}" alt="Imagen del cliente" width="180px" height="100px">
                @else
                    Sin imagen
                @endif
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
@endsection