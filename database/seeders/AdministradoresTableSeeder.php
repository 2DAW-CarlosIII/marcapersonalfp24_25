<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $numAdmins = rand(2, 3);

        for ($i = 0; $i < $numAdmins; $i++) {
            $admin = new Administrador();
            $randomUserId = $users->random()->id;

            if (!Administrador::where('user_id', $randomUserId)->exists()) {
                $admin->user_id = $randomUserId;

                try {
                    $admin->save();
                } catch (\Exception $e) {
                    $this->command->error('Error al insertar administrador ' . $admin->id);
                }
            }
        }
    }
}
