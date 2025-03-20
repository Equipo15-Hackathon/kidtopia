<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
use App\Models\Product;
use App\Models\AgeRange;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    /* public function create()
    {
        //
    } */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|text',
            'price' => 'required|decimal|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'url',
            'category_id' => 'required|integer|min:0',
            'brand_id' => 'required|integer|min:0',
            'age_range_id' => 'required|integer|min:0'
        ]);

        $categoryId = (int)$validated['category_id'];

        $category = Category::find($categoryId);

        if (!$category) {
            return response()->json(['message' => 'The product category id does not exists'], 404);
        }

        $brandId = (int)$validated['brand_id'];

        $brand = Brand::find($brandId);

        if (!$brand) {
            return response()->json(['message' => 'The product brand id does not exists'], 404);
        }

        $ageRangeId = (int)$validated['ageRange_id'];

        $ageRange = AgeRange::find($ageRangeId);

        if (!$ageRange) {
            return response()->json(['message' => 'The product age range id does not exists'], 404);
        }

        $products = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'image' => $validated['image'],
            'category_id' => $categoryId,
            'brand_id' => $brandId,
            'age_range_id' => $ageRangeId
        ]);

        $products->save();

        return response()->json($products, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::find($id);

        if (!$products) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($products, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    /* public function edit(string $id)
    {
        //
    } */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::find($id);

        if (!$products) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'string',
            'description' => 'text',
            'price' => 'decimal|min:0',
            'stock' => 'integer|min:0',
            'image' => 'url',
            'category_id' => 'integer|min:0',
            'brand_id' => 'integer|min:0',
            'age_range_id' => 'integer|min:0'
        ]);

        $categoryId = (int)($validated['category_id'] ?? $products->category_id);

        $category = Category::find($categoryId);

        if (!$category) {
            return response()->json(['message' => 'The product category id does not exists'], 404);
        }

        $brandId = (int)($validated['brand_id'] ?? $products->brand_id);

        $brand = Brand::find($brandId);

        if (!$brand) {
            return response()->json(['message' => 'The product brand id does not exists'], 404);
        }

        $ageRangeId = (int)($validated['ageRange_id'] ?? $products->age_range_id);

        $ageRange = AgeRange::find($ageRangeId);

        if (!$ageRange) {
            return response()->json(['message' => 'The product age range id does not exists'], 404);
        }

        $name = $validated['name'] ?? $products->name;
        $description = $validated['description'] ?? $products->description;
        $price = $validated['price'] ?? $products->price;
        $stock = $validated['stock'] ?? $products->stock;
        $image = $validated['image'] ?? $products->image;

        $products->update([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'stock' => $stock,
            'image' => $image,
            'category_id' => $categoryId,
            'brand_id' => $brandId,
            'age_range_id' => $ageRangeId
        ]);

        $products->save();

        return response()->json($products, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::find($id);

        if (!$products) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $products->delete();

        return response()->json([], 204);
    }
}
