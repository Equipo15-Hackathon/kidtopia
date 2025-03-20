<?php

namespace App\Http\Controllers\Api;

use App\Models\AgeRange;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgeRangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ageRanges = AgeRange::all();
        return response()->json($ageRanges, 200);
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
            'range' => 'required|string'
        ]);

        $ageRanges = AgeRange::create([
            'range' => $validated['range']
        ]);

        $ageRanges->save();

        return response()->json($ageRanges, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ageRanges = AgeRange::find($id);

        if (!$ageRanges) {
            return response()->json(['message' => 'AgeRange not found'], 404);
        }

        return response()->json($ageRanges, 200);
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
        $ageRanges = AgeRange::find($id);

        if (!$ageRanges) {
            return response()->json(['message' => 'AgeRange not found'], 404);
        }

        $validated = $request->validate([
            'range' => 'required|string'
        ]);

        $ageRanges->update([
            'range' => $validated['range']
        ]);

        $ageRanges->save();

        return response()->json($ageRanges, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ageRanges = AgeRange::find($id);

        if (!$ageRanges) {
            return response()->json(['message' => 'AgeRange not found'], 404);
        }

        $ageRanges->delete();

        return response()->json([], 204);
    }
}
