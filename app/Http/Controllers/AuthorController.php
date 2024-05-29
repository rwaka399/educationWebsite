<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function homeAuthor(){
        return view('home');
    }

    public function bookAuthor(){

        $data = Auth::user()->books;


        return view('author.bookAuthor', compact('data'));
    }

    public function createBooks(){
        return view('author.createBook');
    }
}
