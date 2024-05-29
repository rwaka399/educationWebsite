<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function register() {
        return view('auth/register');
    }

    public function registerSave(Request $request) {
        Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'required|min:6',
        ])->validate();

        User::create([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  =>  Hash::make($request->password),
            'type'      =>  '0'
        ]);

        return redirect()->route('login');
    }


    public function login(){
        return view('auth/login');
    }

    public function loginAction(Request $request){
        Validator::make($request->all(), [
            'email'     =>  'required|email',
            'password'  =>  'required',
        ])->validate();



        if(!Auth::attempt($request->only('email','password'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();
        



        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin/users');
        } elseif (auth()->user()->type == 'author'){
            return redirect()->route('author/bookAuthor');
        } else {
            return redirect()->route('home');

        }

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        return redirect()->route('index')->with('sukses','Anda telah log out');
    }

    
}
