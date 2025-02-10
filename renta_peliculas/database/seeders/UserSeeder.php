<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('adminpassword'),
                'remember_token' => Str::random(10),
                'role_id' => 1
            ],
            [
                'name' => 'User 1',
                'email' => 'user1@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user1password'),
                'remember_token' => Str::random(10),
                'role_id' => 2
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user2password'),
                'remember_token' => Str::random(10),
                'role_id' => 2
            ],
            [
                'name' => 'User 3',
                'email' => 'user3@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user3password'),
                'remember_token' => Str::random(10),
                'role_id' => 2
            ],
            [
                'name' => 'User 4',
                'email' => 'user4@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user4password'),
                'remember_token' => Str::random(10),
                'role_id' => 2
            ],
            [
                'name' => 'User 5',
                'email' => 'user5@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user5password'),
                'remember_token' => Str::random(10),
                'role_id' => 2
            ],
            [
                'name' => 'User 6',
                'email' => 'user6@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user6password'),
                'remember_token' => Str::random(10),
                'role_id' => 2
            ],
            [
                'name' => 'User 7',
                'email' => 'user7@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user7password'),
                'remember_token' => Str::random(10),
                'role_id' => 2
            ],
            [
                'name' => 'User 8',
                'email' => 'user8@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user8password'),
                'remember_token' => Str::random(10),
                'role_id' => 2
            ],
            [  
                'name' => 'User 9',
                'email' => 'user9@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user9password'),
                'remember_token' => Str::random(10),
                'role_id' => 2
            ],
            [
                'name' => 'User 10',
                'email' => 'user10@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user10password'),
                'remember_token' => Str::random(10),
                'role_id' => 2
            ],
        ]);
    }
}

