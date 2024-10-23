@extends('layouts.app')

@section('content')
    <h1>Editar Tamaño de Pizza</h1>
    <form action="{{ route('pizza_sizes.update', $size->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="pizza_id">Pizza</label>
            <select name="pizza_id" class="form-control" required>
                @foreach ($pizzas as $pizza)
                    <option value="{{ $pizza->id }}" {{ $size->pizza_id == $pizza->id ? 'selected' : '' }}>
                        {{ $pizza->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="size">Tamaño</label>
            <select name="size" class="form-control" required>
                <option value="pequeña" {{ $size->size == 'pequeña' ? 'selected' : '' }}>Pequeña</option>
                <option value="mediana" {{ $size->size == 'mediana' ? 'selected' : '' }}>Mediana</option>
                <option value="grande" {{ $size->size == 'grande' ? 'selected' : '' }}>Grande</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="text" name="price" class="form-control" value="{{ $size->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
