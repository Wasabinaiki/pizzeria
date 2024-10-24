{{-- resources/views/pizza/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Pizza</h1>
    <form action="{{ route('pizzas.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Nombre de la Pizza</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Crear Pizza</button>
        <a href="{{ route('pizzas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
