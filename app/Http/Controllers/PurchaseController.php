<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\RawMaterial;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::all();
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $rawMaterials = RawMaterial::all();
        return view('purchases.create', compact('suppliers', 'rawMaterials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);

        Purchase::create($request->all());

        return redirect()->route('purchases.index')
                         ->with('success', 'Purchase created successfully.');
    }

    public function show(Purchase $purchase)
    {
        return view('purchases.show', compact('purchase'));
    }

    public function edit(Purchase $purchase)
    {
        $suppliers = Supplier::all();
        $rawMaterials = RawMaterial::all();
        return view('purchases.edit', compact('purchase', 'suppliers', 'rawMaterials'));
    }

    public function update(Request $request, Purchase $purchase)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);

        $purchase->update($request->all());

        return redirect()->route('purchases.index')
                         ->with('success', 'Purchase updated successfully.');
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        return redirect()->route('purchases.index')
                         ->with('success', 'Purchase deleted successfully.');
    }
}
