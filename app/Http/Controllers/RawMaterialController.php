<?php

namespace App\Http\Controllers;

use App\Models\RawMaterial;
use App\Models\Supplier;
use Illuminate\Http\Request;

class RawMaterialController extends Controller
{
    public function index()
    {
        $rawMaterials = RawMaterial::all();
        return view('raw_materials.index', compact('rawMaterials'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('raw_materials.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric',
        ]);

        RawMaterial::create($request->all());

        return redirect()->route('raw_materials.index')
                         ->with('success', 'Raw material created successfully.');
    }

    public function show(RawMaterial $rawMaterial)
    {
        return view('raw_materials.show', compact('rawMaterial'));
    }

    public function edit(RawMaterial $rawMaterial)
    {
        $suppliers = Supplier::all();
        return view('raw_materials.edit', compact('rawMaterial', 'suppliers'));
    }

    public function update(Request $request, RawMaterial $rawMaterial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric',
        ]);

        $rawMaterial->update($request->all());

        return redirect()->route('raw_materials.index')
                         ->with('success', 'Raw material updated successfully.');
    }

    public function destroy(RawMaterial $rawMaterial)
    {
        $rawMaterial->delete();

        return redirect()->route('raw_materials.index')
                         ->with('success', 'Raw material deleted successfully.');
    }
}
