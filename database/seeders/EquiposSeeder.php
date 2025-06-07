<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipo;

class EquiposSeeder extends Seeder
{
    public function run()
    {
        // Insertamos algunos equipos de ejemplo
        Equipo::create([
            'nombre' => 'Fnatic',
            'imagen' => 'Fnatic.png',
            'puntos' => 20,
            'victorias' => 10,
            'derrotas' => 1
        ]);

        Equipo::create([
            'nombre' => 'G2',
            'imagen' => 'G2.png',
            'puntos' => 15,
            'victorias' => 8,
            'derrotas' => 3
        ]);

        Equipo::create([
            'nombre' => 'Gx',
            'imagen' => 'Giantx.png',
            'puntos' => 13,
             'victorias' => 7,
            'derrotas' => 4
        ]);

        Equipo::create([
            'nombre' => 'Heretics',
            'imagen' => 'Heretics.png',
            'puntos' => 0,
            'victorias' => 0,
            'derrotas' => 0
        ]);

        Equipo::create([
            'nombre' => 'Karmine Corp',
            'imagen' => 'karmineCorp.png',
            'puntos' => 0,
            'victorias' => 0,
            'derrotas' => 0
        ]);

        Equipo::create([
            'nombre' => 'Movistar Koi',
            'imagen' => 'MovistarKoi.png',
            'puntos' => 0,
            'victorias' => 0,
            'derrotas' => 0
        ]);

        Equipo::create([
            'nombre' => 'Rogue',
            'imagen' => 'Rogue.png',
            'puntos' => 0,
            'victorias' => 0,
            'derrotas' => 0
        ]);

        Equipo::create([
            'nombre' => 'SK',
            'imagen' => 'SK.png',
            'puntos' => 0,
            'victorias' => 0,
            'derrotas' => 0
        ]);

        Equipo::create([
            'nombre' => 'TeamBDS',
            'imagen' => 'TeamBDS.png',
            'puntos' => 0,
            'victorias' => 0,
            'derrotas' => 0
        ]);

        Equipo::create([
            'nombre' => 'Vitality',
            'imagen' => 'Vitality.png',
            'puntos' => 0,
            'victorias' => 0,
            'derrotas' => 0
        ]);


    }
}
