<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::all();
        return view('pizzas.index', compact('pizzas'));
    }

    public function create()
    {
        return view('pizzas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Pizza::create($request->all());

        return redirect()->route('pizzas.index');
    }

    public function show($id)
    {
        $pizza = Pizza::findOrFail($id);
        return view('pizzas.show', compact('pizza'));
    }

    public function edit($id)
    {
        $pizza = Pizza::findOrFail($id);
        return view('pizzas.edit', compact('pizza'));
    }

    public function update(Request $request, $id)
    {
        $pizza = Pizza::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $pizza->update($request->all());

        return redirect()->route('pizzas.index');
    }

    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect()->route('pizzas.index');
    }
}
