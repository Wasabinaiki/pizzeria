<?php

namespace App\Http\Controllers;

use App\Models\PizzaRawMaterial;
use App\Models\Pizza;
use App\Models\RawMaterial;
use Illuminate\Http\Request;

class PizzaRawMaterialController extends Controller
{
    public function index()
    {
        $pizzaRawMaterials = PizzaRawMaterial::all();
        return view('pizza_raw_materials.index', compact('pizzaRawMaterials'));
    }

    public function create()
    {
        $pizzas = Pizza::all();
        $rawMaterials = RawMaterial::all();
        return view('pizza_raw_materials.create', compact('pizzas', 'rawMaterials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        PizzaRawMaterial::create($request->all());

        return redirect()->route('pizza_raw_materials.index')
                         ->with('success', 'Raw material added to pizza successfully.');
    }

    public function show(PizzaRawMaterial $pizzaRawMaterial)
    {
        return view('pizza_raw_materials.show', compact('pizzaRawMaterial'));
    }

    public function edit(PizzaRawMaterial $pizzaRawMaterial)
    {
        $pizzas = Pizza::all();
        $rawMaterials = RawMaterial::all();
        return view('pizza_raw_materials.edit', compact('pizzaRawMaterial', 'pizzas', 'rawMaterials'));
    }

    public function update(Request $request, PizzaRawMaterial $pizzaRawMaterial)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        $pizzaRawMaterial->update($request->all());

        return redirect()->route('pizza_raw_materials.index')
                         ->with('success', 'Pizza raw material updated successfully.');
    }

    public function destroy(PizzaRawMaterial $pizzaRawMaterial)
    {
        $pizzaRawMaterial->delete();

        return redirect()->route('pizza_raw_materials.index')
                         ->with('success', 'Pizza raw material removed successfully.');
    }
}
