<?php

namespace App\Http\Controllers;

use App\Category;
use http\Env\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Get All Categories
    public function index(Request $request)
    {
        $categories = Category::all();
        return response()->json([
        "message" => $categories
    ], 200);


    }

    // Create Category Page
    public function create()
    {
        dd('hereeeeeeee');

    }

    // Added New Category
    public function store(Request $request)
    {
//        dd('in stooooor');

        // make validation and send error

        $category = new Category();
        $category->name = $request->input("name");
        $category->description = $request->input("description");
        $category->save();
        
        return response()->json([
            "message" => "record created successfully"
        ], 200);

    }

    // View One Category
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json([
            "message" => $category
        ], 200);


    }

    // Edit Category Page
    public function edit($id)
    {

    }

    // Update Category
    public function update(Request $request, $id)
    {

    }

    // Delete Category
    public function destroy($id)
    {

    }
}
