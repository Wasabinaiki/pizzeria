@extends('layouts.app')

@section('content')
    <h1>Lista de Tamaños de Pizzas</h1>
    <a href="{{ route('pizza_sizes.create') }}" class="btn btn-primary">Agregar Tamaño de Pizza</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tamaño</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pizza_sizes as $size)
                <tr>
                    <td>{{ $size->id }}</td>
                    <td>{{ $size->size }}</td>
                    <td>{{ $size->price }}</td>
                    <td>
                        <a href="{{ route('pizza_sizes.edit', $size->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
