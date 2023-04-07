<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function dashboard(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors([
                'email' => 'You must be logged in to access this page.',
            ]);
        }
        $users = User::all();
        return view('dashboard', compact('users'));
    }

    public function addUser(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors([
                'email' => 'You must be logged in to access this page.',
            ]);
        }
        if ($request->isMethod('get')) {
            return view('user/add-user');
        } else {
            $request->validate([
                'nama' => 'required',
                'alamat' => 'required'
            ]);
            $user = new User();
            $user->nama = $request->nama;
            $user->alamat = $request->alamat;
            $user->save();
            session()->flash('success', 'User created successfully!');
            return redirect()->route('dashboard');
        }
    }

    public function editUser($id, Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors([
                'email' => 'You must be logged in to access this page.',
            ]);
        }
        $user = User::find($id);
        if ($request->isMethod('get')) {
            return view('user/edit-user', compact('user'));
        } else {
            $request->validate([
                'nama' => 'required',
                'alamat' => 'required'
            ]);
            $user->nama = $request->nama;
            $user->alamat = $request->alamat;
            $user->save();
            session()->flash('success', 'User updated successfully!');
            return redirect()->route('dashboard');
        }
    }

    public function deleteUser($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors([
                'email' => 'You must be logged in to access this page.',
            ]);
        }
        $user = User::find($id);
        $user->delete();
        session()->flash('success', 'User deleted successfully!');
        return redirect()->route('dashboard');
    }
}
