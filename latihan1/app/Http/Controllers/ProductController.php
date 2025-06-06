<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $q = $request->input('q');
    
    $products = Product::when($q, function ($query) use ($q) {
        return $query->where('name', 'like', '%' . $q . '%');
    })->with('category')->get();

    return view('dashboard.products.index', compact('products', 'q'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('dashboard.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request) 
    { 
        $validator = \Validator::make($request->all(), [ 
            'name' => 'required|string|max:255', 
            'slug' => 'required|string|max:255|unique:products,slug', 
            'sku' => 'required|string|unique:products,sku', 
            'price' => 'required|numeric|min:0', 
            'stock' => 'required|integer|min:0', 
            'product_category_id' => 'nullable|exists:product_categories,id', 
            'description' => 'nullable|string', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  
        ]); 
    
        //check if validation fails 
        if ($validator->fails()) { 
            return response()->json($validator->errors(), 422); 
        } 
    
        $product = new Product; 
        $product->name = $request->name; 
        $product->slug = $request->slug; 
        $product->description = $request->description; 
        $product->sku = $request->sku; 
        $product->price = $request->price; 
        $product->stock = $request->stock; 
        $product->product_category_id = $request->product_category_id; 
        $product->is_active = $request->has('is_active') ? $request->is_active : true; 
    
        if ($request->hasFile('image')) { 
            $image = $request->file('image'); 
            $imageName = time() . '_' . $image->getClientOriginalName(); 
            $imagePath = $image->storeAs('uploads/products', $imageName, 'public'); 
            $product->image_url = $imagePath; 
        } 
    
        $product->save(); 
    
        return new ProductResource($product, 201, 'Product Category Created Successfully'); 
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return new ProductResource($product, 200, 'Product Details'); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = ProductCategory::all();
        $product = Product::findOrFail($id);
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        $product = Product::findOrFail($id); 
    
        $validator = \Validator::make($request->all(), [ 
            'name' => 'required|string|max:255', 
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id, 
            'description' => 'nullable|string', 
            'sku' => 'required|string|unique:products,sku,' . $product->id, 
            'price' => 'required|numeric|min:0', 
            'stock' => 'required|integer|min:0', 
            'product_category_id' => 'nullable|exists:product_categories,id', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'is_active' => 'boolean', 
        ]); 
    
        if ($validator->fails()) { 
            return response()->json($validator->errors(), 422); 
        } 
    
        $product->name = $request->name; 
        $product->slug = $request->slug; 
        $product->description = $request->description; 
        $product->sku = $request->sku; 
        $product->product_category_id = $request->product_category_id; 
        $product->is_active = $request->has('is_active') ? $request->is_active : true; 
    
        if ($request->hasFile('image')) { 
            $image = $request->file('image'); 
            $imageName = time() . '_' . $image->getClientOriginalName(); 
            $imagePath = $image->storeAs('uploads/products', $imageName, 'public'); 
            $product->image_url = $imagePath; 
        } 
    
        $product->save(); 
    
        return new ProductResource($product, 201, 'Product Updated Successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) 
    { 
        $product = Product::findOrFail($id); 
        $product->delete(); 

        return response()->json(['success' => true, 'message' => 'Product Deleted Successfully']); 
    }
}
