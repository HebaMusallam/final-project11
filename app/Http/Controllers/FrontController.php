<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request){
        $categoryId = $request->input('category_id');
        if($categoryId){
            $products = Product::where('category_id',$categoryId)->get();
        }else{
            $products = Product::all();
        }
        $categories = Category::all();
        // $products = Product::take(3)->get();
        return view('home.index',compact('products','categories'));
    }
}
