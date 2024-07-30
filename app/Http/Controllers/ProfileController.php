<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Nex;
use App\Models\ClassType;
use App\Models\Element;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\Agent;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function register() {
        return view('profile.register');
    }

    public function registerAction(Request $r) {
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
        return view('profile.login');
    }

    public function loginAction(Request $r) {

        $val = $r->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt($val)) {
            return redirect(route('agent'));
        } else {
            return Redirect::back()->withErrors(
                [
                    'password' => 'Wrong email or password.'
                ]
            );
        }
    }
    public function logout(Request $r) {
        if(Auth::check()) {
            Auth::logout();
        };
        return redirect(route('home'));
    }

    public function profile(Request $r) {

        $id = $r->id;

        $agents = Agent::all();

        $user = User::find($id);

        $nex = Nex::all();

        $class = ClassType::all();

        $element = Element::all();

        if($user->user_img != null) {
            $img = $user->user_img;
        } else {
            $img = 'img/user.jpg';
        }

        if(Auth::user()->id == $id) {
            return view('profile.profile', compact(['id', 'agents', 'user', 'img', 'nex', 'class', 'element']));
        } else {
            return redirect(route('home'));
        }


    }

    public function updateProfile(Request $r) {
        $user = User::find($r->id);

        if($r->file('user_img') != null) {
            $file = rand(0, 99999) . '-' . $r->file('user_img')->getClientOriginalName();
            $path = $r->file('user_img')->storeAs('uploads', $file, 'upload');
        } else {
            $path = $user->user_img;
        }

        $data = $r->except(['_token']);
        $data['user_img'] = $path;

        DB::transaction(function() use ($r, $data){
            $post = user::where('id', $r->id)->update($data);
        });

        return redirect(route('profile', $r->id));

    }

}
