{{-- resources/views/extra_ingredient/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Ingrediente Extra</h1>
    <form action="{{ route('extra_ingredients.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Nombre del Ingrediente</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="price">Precio</label>
            <input type="number" name="price" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">Crear Ingrediente Extra</button>
        <a href="{{ route('extra_ingredients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
