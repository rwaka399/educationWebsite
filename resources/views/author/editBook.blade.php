@extends('layouts.app')


<div class="p-4 sm:ml-64">
    <div class="mt-6" style="margin-top: 50px">
        <div class=" flex justify-between items-center">
            <div>
                <div class="text-4xl text-gray-900 dark:text-white">Panel Admin</div>
            </div>
            <div>
                Edit User
            </div>
        </div>
    </div>


    
        <div class="">
            <form action="{{ route('author/update', ['id' => $data->id]) }}" method="POST" class="mt-4" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" id="title"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Enter book title" name="title" value="{{ $data->title }}" required />
                </div>
                <div class="mb-5">
                    <label for="genre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
                    <input type="text" id="genre"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Enter book genre" name="genre" value="{{ $data->genre }}" />
                </div>
                <div class="mb-5">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                    <input type="file" id="image"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Enter book image" name="image" value="{{ $data->image }}" />
                </div>
                <div class="mb-5">
                    <label for="isiBuku" class="">Isi Buku</label>
                    <textarea id="isiBuku"
                              class="mySummerNote"
                              name="isiBuku">{{ $data->isiBuku }}</textarea>
                </div>
            
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>
            </form>
        </div>
    




</div>
