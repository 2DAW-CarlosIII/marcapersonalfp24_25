<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        if(User::count() == 0) {
            if(config('app.env') ==='local'){
                User::factory()->create([
                    'name' => 'Admin User',
                    'email' => env('ADMIN_EMAIL'),
                    'password' => bcrypt(env('ADMIN_PASSWORD', 'password')),
                ]);
                User::factory(10)->docente()->create();
                User::factory(30)->alumno()->create();
            }
        }
    }
}
