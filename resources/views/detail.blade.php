@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <div class="flex items-center">
                    <h2 style="font-weight: bold; font-size: 50px">{{ $book->title }}</h2>
                    <form action="{{ route('book/bookmark', ['id' => $book->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary ml-2">
                            @if (Auth::user()->bookmarks()->where('book_id', $book->id)->exists())
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-bookmark" viewBox="0 0 16 16">
                                    <path
                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                                </svg>
                            @endif
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <table>
                    <tr>
                        <td><p><strong>Genre</strong></p></td>
                        <td><p><strong>:</strong></p></td>
                        <td><p>{{ $book->genre }}</p></td>
                    </tr>
                    <tr>
                        <td><p><strong>Author</strong></p></td>
                        <td><p><strong>:</strong></p></td>
                        <td><p>{{ $book->author->name }}</p></td>
                    </tr>
                </table>
                <hr> <!-- Garis bawah yang membatasi author name dengan isi buku -->
                <p>{{ $book->isiBuku }}</p>

            </div>
        </div>
    </div>

@endsection
