<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExtraIngredientController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderExtraIngredientController;
use App\Http\Controllers\OrderPizzaController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\PizzaIngredientController;
use App\Http\Controllers\PizzaRawMaterialController;
use App\Http\Controllers\PizzaSizeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de recursos de la pizzería
    // Rutas que solo un 'admin' puede acceder
    Route::middleware('check.role:admin')->group(function () {
        Route::resource('branches', BranchController::class);
        Route::resource('employees', EmployeeController::class);
        Route::resource('suppliers', SupplierController::class);
        Route::resource('users', UserController::class);
    });

    // Rutas accesibles por cualquier usuario autenticado
    Route::resource('clients', ClientController::class);
    Route::resource('extra-ingredients', ExtraIngredientController::class);
    Route::resource('ingredients', IngredientController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('order-extra-ingredients', OrderExtraIngredientController::class);
    Route::resource('order-pizzas', OrderPizzaController::class);
    Route::resource('pizzas', PizzaController::class);
    Route::resource('pizza-ingredients', PizzaIngredientController::class);
    Route::resource('pizza-raw-materials', PizzaRawMaterialController::class);
    Route::resource('pizza-sizes', PizzaSizeController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::resource('raw-materials', RawMaterialController::class);
});

// Requiere las rutas de autenticación de Breeze
require __DIR__ . '/auth.php';
