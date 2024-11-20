<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Mi Aplicación')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">PIZZERIA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clients.index') }}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employees.index') }}">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('extra-ingredients.index') }}">Ingredientes Extra</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ingredients.index') }}">Ingredientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.index') }}">Órdenes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pizzas.index') }}">Pizzas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('purchases.index') }}">Compras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('suppliers.index') }}">Proveedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">Perfil</a>
                </li>
            </ul>
            <!-- Selector de idioma -->
            <form class="form-inline my-2 my-lg-0">
                <select class="form-control" onchange="window.location.href=this.value;">
                    <option value="{{ route('lang.switch', 'es') }}" {{ app()->getLocale() === 'es' ? 'selected' : '' }}>Español</option>
                    <option value="{{ route('lang.switch', 'en') }}" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>English</option>
                </select>
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
