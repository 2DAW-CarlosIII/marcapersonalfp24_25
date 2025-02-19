<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::truncate();

        $users = User::all();

        foreach ($users as $user)
        {   // Crea un registro en la tabla de admins soli si no existe ya un administrador con el user_id
            Admin::firstOrCreate(['user_id' => $user->id]);
            // firstOrCreate(['user_id' => $user->id]) -> busca en la tabla de admins un registro con el user_id del usuario actual
            // si ya existe no hace nada y si no existe lo crea. De esta manera no se duplican los registros de admins
        }
    }
}
