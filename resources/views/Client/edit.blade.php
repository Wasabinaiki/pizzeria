{{-- resources/views/client/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $client->user->name }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ $client->user->email }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="address">Dirección</label>
            <input type="text" name="address" class="form-control" value="{{ $client->address }}">
        </div>
        <div class="form-group mb-3">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" class="form-control" value="{{ $client->phone }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
