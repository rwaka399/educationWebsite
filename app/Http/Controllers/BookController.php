<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{

    public function createBook(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'title'   => 'required|string|max:255',
            'genre'   => 'required|string|max:255',
            'isiBuku' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            // aturan validasi lainnya
        ]);

        // Jika validasi gagal, kembalikan dengan input dan error
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // dd($request->all());

        // Dapatkan ID pengguna yang login
        $authorId = auth()->id();

        // Image
        $image      = $request->file('image');
        $filename   = date('Y-m-d') . $image->getClientOriginalName();
        $path       = 'images/book' . $filename;

        Storage::disk('public')->put($path, file_get_contents($image));

        // Siapkan data untuk membuat buku baru
        $data = [
            'title'    => $request->input('title'),
            'genre'    => $request->input('genre'),
            'authorId' => $authorId,  // Pastikan ini sesuai dengan nama kolom di database Anda
            'isiBuku'  => $request->input('isiBuku'),
            'image'    => $filename
            // field lain yang terkait dengan buku
        ];

        // Buat buku baru
        Book::create($data);

        // Redirect setelah berhasil membuat buku
        return redirect()->route('author/bookAuthor');
    }



    public function editBook($id)
    {
        $data = Book::findOrFail($id);

        return view('author.editBook', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateBook(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required|string|max:255',
            'genre'     => 'nullable|string|max:255',
            'isiBuku'   => 'nullable|string',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // If validation fails, redirect back with input and errors
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $image      = $request->file('image');
        $filename   = date('Y-m-d') . $image->getClientOriginalName();
        $path       = 'images/book' . $filename;

        Storage::disk('public')->put($path, file_get_contents($image));

        // Prepare the data for updating the book
        $data = [
            'title'     => $request->title,
            'genre'     => $request->genre,
            'isiBuku'   => $request->isiBuku,
            'image'     => $filename
        ];

        // Update the book record
        Book::where('id', $id)->update($data);

        // Redirect to the author's book page with a success message
        return redirect()->route('author/bookAuthor')->with('success', 'Book updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroyBook(string $id)
    {
        $data = Book::findOrFail($id);
        $data->delete();

        return redirect()->route('author/bookAuthor')->with('success', 'Buku berhasil dihapus');
    }

    public function Book()
    {
        $data = Book::get();

        return view('author.bookAuthor', compact('data'));
    }


    public function details($id)
    {
        $book = Book::findOrFail($id);
        return view('detail', compact('book'));
    }



    // Api api
    // Can you make api book laravel for flutter
    public function apiBook()
    {
        $data = Book::get();

        return response()->json($data);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }


    // Bookmark
    public function bookmarkBook($id)
    {
        $user = Auth::user();

        // Check if the bookmark already exists
        $bookmark = Bookmark::where('user_id', $user->id)
            ->where('book_id', $id)
            ->first();

        if ($bookmark) {
            // Remove bookmark if it already exists
            $bookmark->delete();
        } else {
            // Add new bookmark
            Bookmark::create([
                'user_id' => $user->id,
                'book_id' => $id,
            ]);
        }

        return redirect()->back()->with('success', 'Bookmark updated successfully.');
    }

    // shwo bookmark

}
