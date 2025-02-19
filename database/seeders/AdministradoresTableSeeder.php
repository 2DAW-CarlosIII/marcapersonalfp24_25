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
        $numAdmins = rand(1, 3);

        //insertar usuarios aleatorios a la tabla administradores

        for ($i = 0; $i < $numAdmins; $i++) {
            $admin = new Administrador();
            $randomUser = $users->random()->id;

            if (!Administrador::where('user_id', $randomUser)->exists()) {
                $admin->user_id = $randomUser;
                try {
                    $admin->save();
                } catch (\Exception $e) {
                    $this->command->error('Error al insertar administrador ' . $admin->id . $e->getMessage());
                }
            }
        }
    }
}
