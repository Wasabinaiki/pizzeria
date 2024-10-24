<?php

namespace App\Http\Controllers;

use App\Models\PizzaSize;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaSizeController extends Controller
{
    public function index()
    {
        $pizzaSizes = PizzaSize::all();
        return view('pizza_sizes.index', compact('pizzaSizes'));
    }

    public function create()
    {
        $pizzas = Pizza::all();
        return view('pizza_sizes.create', compact('pizzas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric',
        ]);

        PizzaSize::create($request->all());

        return redirect()->route('pizza_sizes.index')
                         ->with('success', 'Pizza size created successfully.');
    }

    public function show(PizzaSize $pizzaSize)
    {
        return view('pizza_sizes.show', compact('pizzaSize'));
    }

    public function edit(PizzaSize $pizzaSize)
    {
        $pizzas = Pizza::all();
        return view('pizza_sizes.edit', compact('pizzaSize', 'pizzas'));
    }

    public function update(Request $request, PizzaSize $pizzaSize)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric',
        ]);

        $pizzaSize->update($request->all());

        return redirect()->route('pizza_sizes.index')
                         ->with('success', 'Pizza size updated successfully.');
    }

    public function destroy(PizzaSize $pizzaSize)
    {
        $pizzaSize->delete();

        return redirect()->route('pizza_sizes.index')
                         ->with('success', 'Pizza size deleted successfully.');
    }
}