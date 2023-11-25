<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
    public function show(Product  $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $product = Product::where("id", $product->id)->with("category")->first();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "category_id" => "required",
            "name" => "required",
            "price" => "required",
            "description" => "required",
        ]);
        // if user choose file
        if ($request->file("image")) {
            File::delete(public_path("/images/" . $product->image));
            $file = $request->file("image");
            $file_name = uniqid() . $file->getClientOriginalName();
            $file->move(public_path("/images"), $file_name);
        } else {
            $file_name = $product->image;
        }
        Product::where("id", $product->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $file_name,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('products.index')->with("success", "Product updated success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::where("id", $product->id)->delete();
        File::delete(public_path("/images/" . $product->image));
        return redirect()->route('products.index')->with("success", "Product deleted success");
    }
}
