<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdministradoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Administrador::truncate();

        $users = User::all();

        //Evita que se creen más administradores que usuarios disponibles
        $numAdmins = min(rand(2, 3), $users->count());

        for ($i = 0; $i < $numAdmins; $i++) {
            $randomUserId = $users->random()->id;

            if (!Administrador::where('user_id', $randomUserId)->exists()) {
                Administrador::create(['user_id' => $randomUserId]);
            }
        }
    }
}
