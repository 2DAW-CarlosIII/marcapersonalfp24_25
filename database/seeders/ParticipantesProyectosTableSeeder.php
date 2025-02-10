<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Proyecto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantesProyectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('participantes_proyectos')->truncate();
        $numeroDeProyectos = Proyecto::count();
        foreach (User::all() as $participante) {
            $numProyectos = rand(0,2);
            for ($i = 0; $i < $numProyectos; $i++) {
                $participante->proyectos()->attach(rand(1, $numeroDeProyectos));
            }
        }
    }
}
