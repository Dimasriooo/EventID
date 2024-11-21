<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Package::with('features')->get();
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
            'Package_nama' => 'required|max:100',
            'description' => 'nullable',
            'Base_price' => 'required|numeric',
            'Max_guest' => 'nullable|integer',
            'category' => 'required|in:wedding,birthday,gathering',
            'duration_hours' => 'nullable|integer'
        ]);

        return Package::create($validatedData);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Package::with('features')->findOrFail($id);
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
        $package = Package::findOrFail($id);
        $validatedData = $request->validate([
            'Package_nama' => 'sometimes|max:100',
            'description' => 'nullable',
            'Base_price' => 'sometimes|numeric',
            'Max_guest' => 'nullable|integer',
            'category' => 'sometimes|in:wedding,birthday,gathering',
            'duration_hours' => 'nullable|integer'
        ]);

        $package->update($validatedData);
        return $package;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = Package::findOrFail($id);
        $package->delete();
        return response()->json(['message' => 'Package deleted successfully']);
    }
}
