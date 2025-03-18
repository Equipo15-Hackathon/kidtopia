<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $categories = Category::create([
            'name' => $validated['name']
        ]);

        $categories->save();

        return response()->json($categories, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::find($id);

        if (!$categories) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($categories, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = Category::find($id);

        if (!$categories) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $categories->update([
            'name' => $validated['name']
        ]);

        $categories->save();

        return response()->json($categories, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::find($id);

        if (!$categories) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $categories->delete();

        return response()->json([], 204);
    }
}
