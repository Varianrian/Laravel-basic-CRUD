<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Accounts extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('login');
        }
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Account::where('email', $request->email)->exists()) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                session()->flash('success', 'Logged in successfully!');
                return redirect()->route('dashboard');
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('register');
        } else {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|same:password'
            ]);
            if (Account::where('email', $request->email)->exists()) {
                return back()->withErrors([
                    'email' => 'The provided email is already registered.',
                ]);
            }
            if ($request->password != $request->password_confirmation) {
                return back()->withErrors([
                    'password' => 'The provided password does not match.',
                ]);
            }
            $account = new Account();
            $account->email = $request->email;
            $account->password = Hash::make($request->password);
            $account->save();
            session()->flash('success', 'Account created successfully!');
            return redirect()->route('login');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
