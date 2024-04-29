<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterLoginController extends Controller
{
    public function register() {
        return view('register');
    }

    public function register_action(Request $r) {
        $r->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $data = $r->only('name', 'email', 'password');

        // Criptografia
        $data['password'] = Hash::make($data['password']);

        $post = User::create($data);

        return redirect(route('login'));
    }

    public function login(Request $r) {
        if(Auth::check()) {
            return redirect(route('home'));
        };
        return view('login');
    }

    public function login_action(Request $r) {

        $val = $r->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt($val)) {
            return redirect(route('home'));
        }
    }
    public function logout(Request $r) {
        Auth::logout();
        return redirect(route('home'));
    }

}
