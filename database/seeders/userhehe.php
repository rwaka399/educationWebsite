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
            'name'      =>  "admin2",
            'email'     =>  "admin2@gmail.com",
            'password'  =>  Hash::make("adminadmin"),
            'type'      =>  '1'
        ]);
    }
}
