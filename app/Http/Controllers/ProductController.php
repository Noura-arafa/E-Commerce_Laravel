<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // Get All Products
    public function index(Request $request)
    {
        $products = Product::with('category')->get();
        // sort
        $sort_by_price = $request->input('sort_by_price');
        if(!empty($sort_by_price)) {
            $products = Product::orderBy('price', $sort_by_price)->get();
        }
        //filter
        $filter_price = $request->input('filter_price');
        $filter_category_id = $request->input('filter_category_id');
        if (isset($filter_price) && $filter_price != '') {
            $products = $products->where('price', $filter_price);
        }
        if (isset($filter_category_id) && $filter_category_id != '') {
            $products = $products->where('category_id', $filter_category_id);
        }
        return response()->json([
            "message" => $products
        ], 200);

    }

    // Create Product Page
    public function create()
    {

    }

    // Added New Product
    public function store(Request $request)
    {
        // make validation and send error

        $product = new Product();
        $product->name = $request->input("name");
        $product->price = $request->input("price");
        $product->quantity = $request->input("quantity");
        $product->category_id = $request->input("category_id");
        $product->save();
        return response()->json([
            "message" => "record created successfully"
        ], 200);
    }

    // View One Product
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return response()->json([
            "message" => $product
        ], 200);

    }

    // Edit Product Page
    public function edit($id)
    {

    }

    // Update Product
    public function update(Request $request, $id)
    {

    }

    // Delete Product
    public function destroy($id)
    {

    }


}
