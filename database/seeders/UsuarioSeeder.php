<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
    
        // Insertar algunos usuarios de ejemplo
        Usuario::create([
        'puuid' => '',
        'rol' => 'admin',
        'rango' => '',
        'correo' => 'paulgf@gmail.com',
        'contrasena' => Hash::make('123456'),
        'nombre' => 'Kenpachi ツ',
        'tag' => '507',
        'icono' => ''
        ]);
    }
}
