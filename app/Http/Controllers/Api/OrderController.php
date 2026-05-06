<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('client')->get();
        return OrderResource::collection($orders);
    }

    public function store(StoreOrderRequest $request)
{
    $data = $request->validated();

    // Crear orden
    $order = Order::create($data);

    // Preparar productos para pivot
    $products = [];

    foreach ($data['products'] as $product) {
        $products[$product['id']] = [
            'quantity' => $product['quantity'],
            'price' => $product['price']
        ];
    }

    // Insertar en tabla pivot
    $order->products()->attach($products);

    return new OrderResource($order->load('products', 'client'));
}

    public function show(string $id)
    {
        $order = Order::with('client')->findOrFail($id);
        return new OrderResource($order);
    }

    public function update(UpdateOrderRequest $request, string $id)
{
    $order = Order::findOrFail($id);
    $data = $request->validated();

    $order->update($data);

    if (isset($data['products'])) {
        $products = [];

        foreach ($data['products'] as $product) {
            $products[$product['id']] = [
                'quantity' => $product['quantity'],
                'price' => $product['price']
            ];
        }

        $order->products()->sync($products);
    }

    return new OrderResource($order->load('products', 'client'));
}

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(null, 204);
    }
}