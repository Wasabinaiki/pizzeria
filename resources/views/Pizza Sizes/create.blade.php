@extends('layouts.app')

@section('content')
    <h1>Agregar Tamaño de Pizza</h1>
    <form action="{{ route('pizza_sizes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="pizza_id">Pizza</label>
            <select name="pizza_id" class="form-control" required>
                @foreach ($pizzas as $pizza)
                    <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="size">Tamaño</label>
            <select name="size" class="form-control" required>
                <option value="pequeña">Pequeña</option>
                <option value="mediana">Mediana</option>
                <option value="grande">Grande</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="text" name="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
