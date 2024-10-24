{{-- resources/views/branch/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Sucursal</h1>
    <form action="{{ route('branches.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Nombre de la Sucursal</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="address">Dirección</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Crear Sucursal</button>
        <a href="{{ route('branches.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
