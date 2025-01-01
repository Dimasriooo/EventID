<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PackageFeatures;
use App\Models\Package;
use Illuminate\Support\Facades\DB;

class PackageFeaturesController extends Controller
{
    public function index() {
        
        $feature = DB::table('Package_features')-> get();
        return view('pages.events.featured.index', [
            "feature" => $feature
        ]);
    }
    public function create()
    {
        $packages = Package::all();
        return view('pages.events.featured.create', compact('packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'packages_id' => 'required|exists:packages,id'
        ]);

        PackageFeatures::create($request->all());
        return redirect()->route('featured.index')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $feature = PackageFeatures::findOrFail($id);
        $packages = Package::all();
        return view('pages.events.featured.edit', compact('feature', 'packages'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'packages_id' => 'required|exists:packages,id'
        ]);

        $feature = PackageFeatures::findOrFail($id);
        $feature->update($request->all());
        return redirect()->route('featured.index')->with('success', 'Data berhasil diupdate');
    }
    public function destroy($id)
    {
        $feature = PackageFeatures::findOrFail($id);
        $feature->delete();
        return redirect()->route('featured.index')->with('success', 'Data berhasil dihapus');
    }
}