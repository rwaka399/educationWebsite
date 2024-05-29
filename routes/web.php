<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::controller(AuthController::class)->group(function () {
    // Register
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('home', 'home')->name('home');
    Route::get('profile', 'profile')->name('profile');
    Route::get('profile/edit', 'profileEdit')->name('profile.edit');
    Route::get('book/bookmark', 'bookmark')->name('home/bookmark');
});


Route::controller(BookController::class)->group(function () {
    Route::get('/book/{id}', [BookController::class, 'show'])->name('book.show');
    Route::get('/book/details/{id}', [BookController::class, 'details'])->name('book/details');
    // Route::get('/book/bookmark', 'showBookmark')->name('book/bookmark');
});

// Menyimpan bookmark
Route::middleware(['auth'])->group(function () {
    Route::post('/book/bookmark/{id}', [BookController::class, 'bookmarkBook'])->name('book/bookmark');
});


// Khusus User 
Route::middleware(['auth', 'user-access:user'])->group(function () {
    // Route::get('/home', [HomeController::class, 'home'])->name('home');
});



// Admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    // Route ke Panel Admin
    // Route::get('admin/home', [AdminController::class, 'adminHome'])->name('home');
    Route::get('/admin/users', [HomeController::class, 'adminUser'])->name('admin/users');

    // CRUD
    Route::get('admin/create', [AdminController::class, 'createUser'])->name('admin/create');
    Route::post('/createNew', [AdminController::class, 'createNew'])->name('admin.create.new');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin/edit');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin/update');
    Route::delete('admin/delete/{id}', [AdminController::class, 'delete'])->name('admin/delete');
});

// Khusus Author
Route::middleware(['auth', 'user-access:author'])->group(function () {
    // Route::get('author/home', [AuthorController::class, 'homeAuthor'])->name('home');
    Route::get('author/book', [AuthorController::class, 'bookAuthor'])->name('author/bookAuthor');

    // CRUD BUKU
    Route::get('author/create', [AuthorController::class, 'createBooks'])->name('author/create');
    Route::post('author/createBook', [BookController::class, 'createBook'])->name('author/createBook');
    Route::get('author/edit/{id}', [BookController::class, 'editBook'])->name('author/edit');
    Route::put('author/update/{id}', [BookController::class, 'updateBook'])->name('author/update');
    Route::delete('author/delete/{id}', [BookController::class, 'destroyBook'])->name('author/delete');
});


Route::get('/', [Controller::class, 'index'])->name('index');
