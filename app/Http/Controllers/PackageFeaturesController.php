<?php

namespace App\Http\Controllers;

use App\Models\PackageFeatures;
use Illuminate\Http\Request;

class PackageFeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PackageFeatures::with('package')->get();
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
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable',
            'packages_id' => 'required|exists:packages,id',
        ]);

        return PackageFeatures::create($validatedData);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return PackageFeatures::with('package')->findOrFail($id);
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
        $packageFeature = PackageFeatures::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'sometimes|max:100',
            'description' => 'nullable'
        ]);

        $packageFeature->update($validatedData);
        return $packageFeature;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $packageFeature = PackageFeatures::findOrFail($id);
        $packageFeature->delete();
        return response()->json(['message' => 'Package feature deleted successfully']);
    }
}
