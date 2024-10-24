<?php
namespace App\Http\Controllers;

use App\Models\OrderExtraIngredient;
use App\Models\Order;
use App\Models\ExtraIngredient;
use Illuminate\Http\Request;

class OrderExtraIngredientController extends Controller
{
    public function index()
    {
        $orderExtraIngredients = OrderExtraIngredient::all();
        return view('order_extra_ingredients.index', compact('orderExtraIngredients'));
    }

    public function create()
    {
        $orders = Order::all();
        $extraIngredients = ExtraIngredient::all();
        return view('order_extra_ingredients.create', compact('orders', 'extraIngredients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'extra_ingredient_id' => 'required|exists:extra_ingredients,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        OrderExtraIngredient::create($request->all());

        return redirect()->route('order_extra_ingredients.index')
                         ->with('success', 'Extra ingredient added to order successfully.');
    }

    public function show(OrderExtraIngredient $orderExtraIngredient)
    {
        return view('order_extra_ingredients.show', compact('orderExtraIngredient'));
    }

    public function edit(OrderExtraIngredient $orderExtraIngredient)
    {
        $orders = Order::all();
        $extraIngredients = ExtraIngredient::all();
        return view('order_extra_ingredients.edit', compact('orderExtraIngredient', 'orders', 'extraIngredients'));
    }

    public function update(Request $request, OrderExtraIngredient $orderExtraIngredient)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'extra_ingredient_id' => 'required|exists:extra_ingredients,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        $orderExtraIngredient->update($request->all());

        return redirect()->route('order_extra_ingredients.index')
                         ->with('success', 'Order extra ingredient updated successfully.');
    }

    public function destroy(OrderExtraIngredient $orderExtraIngredient)
    {
        $orderExtraIngredient->delete();

        return redirect()->route('order_extra_ingredients.index')
                         ->with('success', 'Order extra ingredient removed successfully.');
    }
}
