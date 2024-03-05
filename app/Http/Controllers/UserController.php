<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        //fungsinya untuk memanggil semua data penerbangan
        $user = User::all(); //select * from penerbangan
        //passing data penerbangan ke views
        return view('user.index', compact('user'));
    }

    public function create()
    {
        //menampilkan halaman create.blade.php
        return view('user.create');
    }

    public function edit($id)
    {
        //mengambil data penerbangan per id
        $user = User::find($id);
        //show data penerbangan per id
        return view('user.edit', compact('user'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',

        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request['password']),

        ]);

        // dd($penerbangan);
        if ($user) {
            return redirect()->route('user.index')->with('success', 'New USer created successfully');
        } else{
            return redirect()->route('user.index')->with('errors', 'User created failed');
        }


    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',

        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        // Save the updated Penerbangan
        $user->save();

        // Redirect with success message
        return redirect()->route('user.index')->with('success', 'Data User updated successfully');
    }

    public function destroy($id)
    {
        //mendelete data penerbangan per id
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data User deleted successfully');
    }


}
