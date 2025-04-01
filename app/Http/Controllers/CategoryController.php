<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::paginate(4);
        return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
             'name' => 'required|string|max:255|'
            ],[
              'name.required'=>'the category name is required ',
              'name.max'=>'the category name may not be greater than 255 character'
            ]
        );
        $categories = new Category;
        $categories->name = $request->name;
        $categories->save();
        return redirect()->back();
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request , $id)
    {
        $request->validate(
            [
             'name' => 'required|string|max:255'
            ],[
              'name.required'=>'the category name is required ',
              'name.max'=>'the category name may not be greater than 255 character'
            ]
        );
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect('categories');
    }
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back();
    }
}
