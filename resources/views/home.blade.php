@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="ml-4 mt-6" style="margin-top: 50px">
    <div class="flex justify-between items-center">
        <div>
            <div class="text-4xl text-gray-900 dark:text-white">Halaman Home</div>
        </div>
        <div>
            List Book
        </div>
    </div>
    <div class="" style="margin-top: 20px">
            @foreach($data as $book)
                <a href="{{ route('book/details', ['id' => $book->id]) }}">
                    <div class="border rounded-lg p-4" style="width: 50%">
                        <div class="flex">
                            <img src="{{ asset('storage/images/book'.$book->image)}}" alt="" style="width: 150px">
                            <div class="flex flex-col" style="margin-left: 10px;">
                                <strong class="" >{{ $book->title }}</strong>
                                <span>{{ $book->genre }}</span>
                                <span>{{ $book->author->name }}</span>
                                <span>{{ $book->created_at }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        
    </div>
</div>
@endsection
