<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AdministradoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('administradores')->truncate();
        DB::table('administradores')->insert([
            'email' => '4136605@alu.murciaeduca.es',
            'user_id' => 11
        ]);
    }

}
