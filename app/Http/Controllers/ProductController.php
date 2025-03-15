<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.index',compact('products','categories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:1000'
        ],[
            'name.required' => 'the name is required',
            'quantity.required' => 'the quantity is required',
            'price.required'=>'the price is required',
            'category_id.required'=>'the category_id is required',
             'description.max' => 'the description may not be greater than 1000 characters',
             'category_id.exists' => 'the selected category is  invalid'
        ]
        );
        $product = new Product;
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->save();
        return redirect()->back();
    }
    public function show(Product $product) {}
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        // $category_name = Category::where('id',$product->category_id)->first();
        $category_name = Category::find($product->category_id);
        return view('admin.products.edit', compact('product','categories','category_name'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            // 'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:1000'
        ],[
            'name.required' => 'the name is required',
            'quantity.required' => 'the quantity is required',
            'price.required'=>'the price is required',
            // 'category_id.required'=>'the category_id is required',
             'description.max' => 'the description may not be greater than 1000 characters',
            //  'category_id.exists' => 'the selected category is  invalid'
        ]
        );
        $product = Product::find($id);
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->save();
        return redirect('products');
    }
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back();
    }
}
