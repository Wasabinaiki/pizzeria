{{-- resources/views/order_pizza/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Pizza al Pedido</h1>
    <form action="{{ route('order_pizza.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="order_id">ID del Pedido</label>
            <input type="number" name="order_id" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="pizza_size_id">ID del Tamaño de la Pizza</label>
            <input type="number" name="pizza_size_id" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="quantity">Cantidad</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Agregar Pizza</button>
        <a href="{{ route('order_pizza.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
