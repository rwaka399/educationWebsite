<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function home() {
        $data = Book::get();

        return view('home', compact('data'));
    }

    public function adminUser(){
        $data = User::get();

        return view('admin.userAdmin', compact('data'));
    }
    
    // Can you make function profile 
    public function profile(){
        $data = Auth::user();

        return view('profile', compact('data'));
    }

    public function bookmark(){
        $data = Auth::user()->bookmarks;
        $book = Book::get('authorId');

        return view('bookmark', compact('data', 'book'));
    }

}
