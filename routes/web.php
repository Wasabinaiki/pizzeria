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
use App\Http\Controllers\LanguageController; // Agregar controlador de idiomas

// Ruta de inicio
Route::get('/', function () {
    return view('welcome');
});

// Ruta del dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Cambio de idioma
Route::get('/lang/{locale}', [LanguageController::class, 'switchLang'])->name('lang.switch');

// Grupo de rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de recursos para la pizzería
    Route::resource('branches', BranchController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('employees', EmployeeController::class);
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
    Route::resource('suppliers', SupplierController::class);
    Route::resource('users', UserController::class);
});

// Requiere las rutas de autenticación de Breeze
require __DIR__ . '/auth.php';
