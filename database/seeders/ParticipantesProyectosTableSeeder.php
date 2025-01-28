<?php

namespace Database\Seeders;

use App\Models\ParticipantesProyecto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantesProyectosTableSeeder extends Seeder
{
    /**
     * Ejecutar las semillas de la base de datos.
     */
    public function run(): void
    {
        ParticipantesProyecto::truncate();
        foreach (self::generarDatosAleatorios() as $pp) {
            ParticipantesProyecto::insert([
                'users_id' => $pp['users_id'],
                'proyecto_id' => $pp['proyecto_id'],
            ]);
        }
        $this->command->info('¡Tabla participantes_proyectos inicializada con datos!');
    }

    public static function generarDatosAleatorios(): array
    {
        $estudiantes = range(1, 10);
        $proyectos = range(1, 10);
        shuffle($estudiantes);
        shuffle($proyectos);

        $datos = [];
        for ($i = 0; $i < 10; $i++) {
            $datos[] = [
                'users_id' => $estudiantes[$i],
                'proyecto_id' => $proyectos[$i],
            ];
        }

        return $datos;
    }
}
