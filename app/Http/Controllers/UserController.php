<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
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
            'Nama' => 'required|max:50',
            'Email' => 'required|email|unique:users,Email',
            'Password' => 'required|min:6',
            'phone_number' => 'nullable|max:20',
            'role' => 'in:admin,customer'
        ]);

        $validatedData['Password'] = Hash::make($validatedData['Password']);
        return User::create($validatedData);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::findOrFail($id);
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
        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'Nama' => 'sometimes|max:50',
            'Email' => 'sometimes|email|unique:users,Email,'.$id.',UsersID',
            'Password' => 'sometimes|min:6',
            'phone_number' => 'nullable|max:20',
            'role' => 'sometimes|in:admin,customer'
        ]);
        
        if (isset($validatedData['Password'])) {
            $validatedData['Password'] = Hash::make($validatedData['Password']);
        }

        $user->update($validatedData);
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
