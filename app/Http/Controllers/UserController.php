<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data User';
        $users = User::all();
        return view ('admin.data', compact('users', 'title'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
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
    public function update(Request $request, $id)
    {
        $request->validate([
            "nama" => "required",
            "role" => "required",
            Rule::unique('users', 'email')->ignore($id),
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        if ($request->password) {
            $request->validate([
                'password' => 'min:8'
            ]);
            $user->password = bcrypt($request->password);
            $user->save();
        }

        return redirect()->back()->with('success', 'Berhasil mengedit sebuah data pengguna!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user  = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus sebuah data');
    }
}
