<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userhehe extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'      =>  "ocid",
            'email'     =>  "ocid@gmail.com",
            'password'  =>  Hash::make("author"),
            'type'      =>  '2'
        ]);
    }
}
