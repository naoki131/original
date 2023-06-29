<?php

namespace Database\Seeders;
use Illuminate\Foundation\Auth\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(2)->create();

         \App\Models\User::factory()->create([
             'name' => 'aaa',
             'email' => 'test1@test.com',
             'password' => 'testtest',
         ]);
    }
}
