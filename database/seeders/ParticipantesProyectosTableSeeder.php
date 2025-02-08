<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Proyecto;

class ParticipantesProyectosTableSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = User::all();
        $proyectos = Proyecto::all();

        foreach ($usuarios as $usuario) {

            $numProyectos = rand(0, 2);
            $proyectosAleatorios = $proyectos->random(min($numProyectos, $proyectos->count()));
            $usuario->proyectos()->syncWithoutDetaching($proyectosAleatorios->pluck('id')->toArray());
        }

        foreach ($proyectos as $proyecto) {

            $numUsuarios = rand(0, 2);
            $usuariosAleatorios = $usuarios->random(min($numUsuarios, $usuarios->count()));
            $proyecto->users()->syncWithoutDetaching($usuariosAleatorios->pluck('id')->toArray());
        }
    }
}
