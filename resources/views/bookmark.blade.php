@extends('layouts.app')

@section('title', 'Bookmark')

@section('content')
<div class="container mt-4">
    <div class="ml-4 mt-6" style="margin-top: 50px">
        <div class="flex justify-between items-center">
            <div>
                <div class="text-4xl text-gray-900 dark:text-white">Bookmarks</div>
            </div>
            <div>
                List Book
            </div>
        </div>

        <div class="" style="margin-top: 20px">
            @forelse ($data as $bookmark)
                <a href="{{ route('book/details', ['id' => $bookmark->book->id]) }}">
                    <div class="border rounded-lg p-4 mb-4" style="width: 50%">
                        <div class="flex">
                            <img src="{{ asset('storage/images/book' . $bookmark->book->image) }}" alt="{{ $bookmark->book->title }}" style="width: 150px">
                            <div class="flex flex-col" style="margin-left: 10px;">
                                <strong>{{ $bookmark->book->title }}</strong>
                                <span>{{ $bookmark->book->genre }}</span>
                                <span>{{ $bookmark->book->author->name }}</span>
                                <span>{{ $bookmark->book->created_at }}</span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('book.show', $bookmark->book->id) }}" class="btn btn-primary">View Details</a>
                            <form action="{{ route('book/bookmark', $bookmark->book->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger">Remove Bookmark</button>
                            </form>
                        </div>
                    </div>
                </a>
            @empty
                <p>No bookmarks found.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
