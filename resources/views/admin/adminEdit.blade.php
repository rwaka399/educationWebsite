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


    
        <div class="max-w-sm mx-auto">
            <form action="{{ route('admin/update', ['id' => $data->id]) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@gmail.com" name="email" value="{{ $data->email }}" required />
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your Name" name="name" value="{{ $data->name }}" required />
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="password" />
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
    
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    




</div>
