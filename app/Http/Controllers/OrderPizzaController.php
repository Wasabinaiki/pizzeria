<?php

namespace App\Http\Controllers;

use App\Models\OrderPizza;
use App\Models\Order;
use App\Models\Pizza;
use App\Models\PizzaSize;
use Illuminate\Http\Request;

class OrderPizzaController extends Controller
{
    public function index()
    {
        $orderPizzas = OrderPizza::all();
        return view('order_pizzas.index', compact('orderPizzas'));
    }

    public function create()
    {
        $orders = Order::all();
        $pizzas = Pizza::all();
        $pizzaSizes = PizzaSize::all();
        return view('order_pizzas.create', compact('orders', 'pizzas', 'pizzaSizes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'pizza_id' => 'required|exists:pizzas,id',
            'pizza_size_id' => 'required|exists:pizza_sizes,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        OrderPizza::create($request->all());

        return redirect()->route('order_pizzas.index')
                         ->with('success', 'Pizza added to order successfully.');
    }

    public function show(OrderPizza $orderPizza)
    {
        return view('order_pizzas.show', compact('orderPizza'));
    }

    public function edit(OrderPizza $orderPizza)
    {
        $orders = Order::all();
        $pizzas = Pizza::all();
        $pizzaSizes = PizzaSize::all();
        return view('order_pizzas.edit', compact('orderPizza', 'orders', 'pizzas', 'pizzaSizes'));
    }

    public function update(Request $request, OrderPizza $orderPizza)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'pizza_id' => 'required|exists:pizzas,id',
            'pizza_size_id' => 'required|exists:pizza_sizes,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        $orderPizza->update($request->all());

        return redirect()->route('order_pizzas.index')
                         ->with('success', 'Pizza order updated successfully.');
    }

    public function destroy(OrderPizza $orderPizza)
    {
        $orderPizza->delete();

        return redirect()->route('order_pizzas.index')
                         ->with('success', 'Pizza removed from order successfully.');
    }
}
