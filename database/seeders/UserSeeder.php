<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'rania',
            'email' => 'admin@rania.my',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'updated_at' => now(),
            'created_at' => now()
        ]);
    }
}
