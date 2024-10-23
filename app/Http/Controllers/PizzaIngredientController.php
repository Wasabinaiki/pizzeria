<?php

namespace App\Http\Controllers;

use App\Models\PizzaIngredient;
use Illuminate\Http\Request;

class PizzaIngredientController extends Controller
{
    public function index() {
        $pizzaIngredients = PizzaIngredient::all();
        return view('pizza_ingredients.index', compact('pizzaIngredients'));
    }

    public function create() {
        return view('pizza_ingredients.create');
    }

    public function store(Request $request) {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        PizzaIngredient::create([
            'pizza_id' => $request->pizza_id,
            'ingredient_id' => $request->ingredient_id,
        ]);

        return redirect()->route('pizza_ingredients.index');
    }

    public function show($id) {
        $pizzaIngredient = PizzaIngredient::findOrFail($id);
        return view('pizza_ingredients.show', compact('pizzaIngredient'));
    }

    public function edit($id) {
        $pizzaIngredient = PizzaIngredient::findOrFail($id);
        return view('pizza_ingredients.edit', compact('pizzaIngredient'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        $pizzaIngredient = PizzaIngredient::findOrFail($id);
        $pizzaIngredient->update([
            'pizza_id' => $request->pizza_id,
            'ingredient_id' => $request->ingredient_id,
        ]);

        return redirect()->route('pizza_ingredients.index');
    }

    public function destroy($id) {
        $pizzaIngredient = PizzaIngredient::findOrFail($id);
        $pizzaIngredient->delete();
        return redirect()->route('pizza_ingredients.index');
    }
}
