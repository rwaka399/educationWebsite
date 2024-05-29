@extends('layouts.app')

@section('content')

    <div class="ml-4 mt-6" style="margin-top: 50px">
        <div class="flex justify-between items-center">
            <div>
                <div class="text-4xl text-gray-900 dark:text-white">Panel Author</div>
            </div>
            <div>
                Create Book
            </div>
        </div>
    </div>

    <div class="">
        <form action="{{ route('author/createBook') }}" method="POST" class="mt-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="title"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" id="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="King Arthur" name="title" required />
            </div>

            <div class="mb-5">
                <label for="genre"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
                <input type="text" id="genre"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Action, Horror" name="genre" required />
            </div>

            <div class="mb-5">
                <label for="image"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                <input type="file" id="image"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="image" required />
            </div>

            <div class="mb-5">
                <label for="isiBuku"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi Buku</label>
                <textarea id="isiBuku"
                    class="mySummerNote bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="isiBuku" required></textarea>
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>

@endsection
