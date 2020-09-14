<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Auth;


class OrderController extends Controller
{
    // Get All Orders
    public function index(Request $request)
    {

    }

    // Create Order Page
    public function create()
    {

    }

    // Added New Order
    public function store(Request $request)
    {
//        $user = Auth::user();

        $order = new Order();
        $order->client_id = $request->client_id;
        $order->total_price = 0;
        $order->product_count = 0;
        $order->save();
        $products_ids = [];
        $products_data = $request->input('products');
        foreach ($products_data as $product) {
            $order->products()->attach($product['id'], ['quantity' => $product['quantity']]);
            array_push($products_ids, $product['id']);
        }
        $products = Product::find($products_ids);
        $order->total_price = $products->sum('price');
        $order->product_count = count($products_ids);
        $order->save();

        return response()->json([
            "message" => "record created successfully"
        ], 200);

    }

    // View One Order
    public function show($id)
    {
        return back();

    }

    // Edit Order Page
    public function edit($id)
    {

    }

    // Update Order
    public function update(Request $request, $id)
    {

    }

    // Delete Order
    public function destroy($id)
    {

    }
}
