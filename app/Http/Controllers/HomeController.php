<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $r) {
        $AuthUser = Auth::user();

        return view('index', compact('AuthUser'));
    }

    public function redirect(Request $r) {
        return redirect('/home');
    }
}
