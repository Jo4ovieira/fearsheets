<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TerminalController extends Controller
{
    public function index(Request $r) {
        return view('terminal.index');
    }

    public function access(Request $r) {
        if($r->user == "Petrov" && $r->password == "Osalto") {
            return redirect(route('petrov'));
        } else {
            return Redirect::back()->withErrors(
                [
                    'user' => 'Usuário não identificado.',
                    'password' => 'Senha inválida.'
                ]
            );
        }
    }

    public function petrov() {
        return view('terminal.petrov');
    }
}
