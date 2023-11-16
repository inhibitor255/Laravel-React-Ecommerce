<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderby("id", "desc")->with("category")->paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "category_id" => "required",
            "name" => "required",
            "price" => "required",
            "description" => "required",
            "image" => "required|mimes:jpg,bmp,png"
        ]);

        // image upload
        $file = $request->file('image');
        $file_name = uniqid() . $file->getClientOriginalName();
        $file->move(public_path("/images"), $file_name);

        // database
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $file_name,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('products.create')->with("success", "Product created success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "name" => "required"
        ], [
            "name.required" => "Category name is required."
        ]);
        Category::where("id", $category->id)->update([
            "name" => $request->name,
        ]);
        return redirect()->back()->with("success", "Category updated success.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect()->back()->with("success", "Category deleted success.");
    }
}
