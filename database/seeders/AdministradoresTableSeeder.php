<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministradoresTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('administradores')->truncate();

        $users = User::all();

        foreach($users as $user){

            DB::table('administradores')->insert(
                ['user_id' => $user->id]
            );
        }
    }
}
