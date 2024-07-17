<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{

    public function loginView(Request $request) {
        $user = $request->user();

        if (empty($user)) {
            return view('login');
        }

        return redirect()->route('tasks.list');
    }

    public function store(Request $request)
    {
        $val = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|string',
            'confirmPassword' => 'required|same:password',
            'name' => 'string|max:200|required',
        ]);

        try {
            $usuario = User::create($val);
            return redirect()->back()->with('state', 'Usuario registrado correctamente.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $remember = $request->has('remember') ? true : false;
        if (Auth::attempt($validated, $remember)) {

            $request->session()->regenerate();
            return redirect()->intended(route('tasks.list'));
        }

        redirect()->back(400);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home'));
    }
}
