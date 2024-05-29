<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateUserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->where('type', 0)->update(['type' => 'user']);
        DB::table('users')->where('type', 1)->update(['type' => 'admin']);
        DB::table('users')->where('type', 2)->update(['type' => 'author']);   
    }
}
