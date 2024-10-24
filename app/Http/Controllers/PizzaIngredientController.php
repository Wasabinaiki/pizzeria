<?php

namespace App\Http\Controllers;

use App\Models\PizzaIngredient;
use App\Models\Pizza;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class PizzaIngredientController extends Controller
{
    public function index()
    {
        $pizzaIngredients = PizzaIngredient::all();
        return view('pizza_ingredients.index', compact('pizzaIngredients'));
    }

    public function create()
    {
        $pizzas = Pizza::all();
        $ingredients = Ingredient::all();
        return view('pizza_ingredients.create', compact('pizzas', 'ingredients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        PizzaIngredient::create($request->all());

        return redirect()->route('pizza_ingredients.index')
                         ->with('success', 'Pizza ingredient added successfully.');
    }

    public function show(PizzaIngredient $pizzaIngredient)
    {
        return view('pizza_ingredients.show', compact('pizzaIngredient'));
    }

    public function edit(PizzaIngredient $pizzaIngredient)
    {
        $pizzas = Pizza::all();
        $ingredients = Ingredient::all();
        return view('pizza_ingredients.edit', compact('pizzaIngredient', 'pizzas', 'ingredients'));
    }

    public function update(Request $request, PizzaIngredient $pizzaIngredient)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        $pizzaIngredient->update($request->all());

        return redirect()->route('pizza_ingredients.index')
                         ->with('success', 'Pizza ingredient updated successfully.');
    }

    public function destroy(PizzaIngredient $pizzaIngredient)
    {
        $pizzaIngredient->delete();

        return redirect()->route('pizza_ingredients.index')
                         ->with('success', 'Pizza ingredient deleted successfully.');
    }
}

