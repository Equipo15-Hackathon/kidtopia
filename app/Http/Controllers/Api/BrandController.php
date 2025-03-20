<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return response()->json($brands, 200);
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
            'name' => 'required|string'
        ]);

        $brands = Brand::create([
            'name' => $validated['name']
        ]);

        $brands->save();

        return response()->json($brands, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brands = Brand::find($id);

        if (!$brands) {
            return response()->json(['message' => 'Brand not found'], 404);
        }

        return response()->json($brands, 200);
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
        $brands = Brand::find($id);

        if (!$brands) {
            return response()->json(['message' => 'Brand not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $brands->update([
            'name' => $validated['name']
        ]);

        $brands->save();

        return response()->json($brands, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brands = Brand::find($id);

        if (!$brands) {
            return response()->json(['message' => 'Brand not found'], 404);
        }

        $brands->delete();

        return response()->json([], 204);
    }
}
