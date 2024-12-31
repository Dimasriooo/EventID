<?php

namespace App\Http\Controllers\Admin;
use App\Models\Package;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function index() {

        $packages = DB::table('packages')-> get();
        return view('pages.events.packages.index',[
            "packages" => $packages
        ]);
    }
    public function edit($id) {
        // Mengambil data berdasarkan ID dari tabel `packages`
        $package = DB::table('packages')->where('id', $id)->first();

        if (!$package) {
            return redirect()->route('packages.index')->with('error', 'Package not found.');
        }

        return view('pages.events.packages.edit', [
            "package" => $package
        ]);
    }

    // Fungsi untuk menyimpan data package baru
    public function store(Request $request)
    {
        // Validasi input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'base_price' => 'required|numeric',
            'max_guest' => 'required|numeric',
            'category' => 'required|string',
            'duration_hours' => 'required|numeric',
        ]);

        // Simpan data package baru
        Package::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('packages.index')->with('success', 'Package created successfully!');
    }
    public function create()
    {
        return view('pages.events.packages.create');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'base_price' => 'required|numeric',
            'max_guest' => 'required|numeric',
            'category' => 'required|string',
            'duration_hours' => 'required|numeric',
        ]);

        $package = Package::findOrFail($id);
        $package->update($validated);

        return redirect()->route('packages.index')->with('success', 'Package updated successfully!');
    }

    // Fungsi untuk menghapus data package
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('packages.index')->with('success', 'Package deleted successfully!');
    }
}

